<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Activity;
use AppBundle\Entity\Ride;
use AppBundle\Form\ActivityType;
use AppBundle\Form\RideType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Activity controller.
 *
 * @Route("/activity")
 */
class ActivityController extends Controller
{
    /**
     * @Route("/", name="activity_index")
     * @Method("GET")
     */
    public function indexAction() : Response
    {
        $em = $this->getDoctrine()->getManager();

        $activities = $em->getRepository('AppBundle:Activity')->findAll();

        return $this->render('activity/index.html.twig', [
            'activities' => $activities,
        ]);
    }

    /**
     * @Route("/new", name="activity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) : Response
    {
        $forms = [];

        foreach ($this->getFormTypesMap() as $activityType => $formType) {
            $forms[] = $this->createForm($formType, new $activityType);
        }

        if ($request->isMethod('POST')) {
            foreach ($forms as $form) {
                $form->handleRequest($request);

                if (!$form->isSubmitted()) continue;

                if ($form->isSubmitted() && $form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $activity = $form->getData();
                    $em->persist($activity);
                    $em->flush();

                    return $this->redirectToRoute('activity_show', ['id' => $activity->getId()]);
                }
            }
        }

        $formViews = [];

        foreach ($forms as $form) {
            $formViews[strtolower((new \ReflectionClass($form->getData()))->getShortName())] = $form->createView();
        }

        return $this->render('activity/new.html.twig', [
            'forms' => $formViews
        ]);
    }

    /**
     * @Route("/{id}", name="activity_show")
     * @Method("GET")
     */
    public function showAction(Activity $activity) : Response
    {
        $deleteForm = $this->createDeleteForm($activity);
        $templatePath = $this->getTemplatePath($activity, 'show');

        return $this->render($templatePath, [
            'activity' => $activity,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="activity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Activity $activity) : Response
    {
        $editForm = $this->createForm($this->getFormType($activity), $activity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush();

            return $this->redirectToRoute('activity_edit', ['id' => $activity->getId()]);
        }

        $templatePath = $this->getTemplatePath($activity, 'edit');
        $deleteForm = $this->createDeleteForm($activity);

        return $this->render($templatePath, [
            'activity' => $activity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="activity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Activity $activity) : Response
    {
        $form = $this->createDeleteForm($activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($activity);
            $em->flush();
        }

        return $this->redirectToRoute('activity_index');
    }

    private function createDeleteForm(Activity $activity) : Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activity_delete', ['id' => $activity->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }

    private function getTemplatePath(Activity $activity, string $action) : string
    {
        $className = strtolower((new \ReflectionClass($activity))->getShortName());
        $templatePath = "activity/$className/$action.html.twig";

        if (!$this->get('templating')->exists($templatePath)) {
            $templatePath = "activity/$action.html.twig";
        }

        return $templatePath;
    }

    private function getFormTypesMap() : array
    {
        return [
            Activity::class => ActivityType::class,
            Ride::class     => RideType::class
        ];
    }

    private function getFormType(Activity $activity) : string
    {
        $class = get_class($activity);

        if (!isset($this->getFormTypesMap()[$class])) {
            throw new \UnexpectedValueException('No form type exists for given entity.');
        }

        return $this->getFormTypesMap()[$class];
    }
}
