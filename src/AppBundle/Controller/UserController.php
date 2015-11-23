<?php
namespace AppBundle\Controller;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class UserController extends Controller
{
    /**
     *  indexAction
     *
     * @Route(path="/", name="app_usercontroller_index")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        /* $user = new User();
         $user->setEmail('pedrol48@gmail.com');
         $user->setPassword('1234');
         $user->setUsername('paco');
         $user->setAge('21');
         $m->persist($user);
         $m->flush();*/
        $repository = $m->getRepository('AppBundle:User');
        /**
         * @var User $user
         */
        //$user = $repository->findOneByUsername('pedro');
        //$user->setEmail('nuevo@email.com');
        //$m->remove($user);
        $users = $repository->findAll();
        //die;
        return $this->render('user/index.html.twig',
            [
                'users' => $users,
            ]
        );
    }
    /**
     * @Route("/update/{id}", name="app_user_update")
     */
    public function  updateAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:User');
        $user = $repository->find($id);
        return $this->render('user/update.html.twig',
            [
                'user' => $user,
            ]
        );
    }
    /**
     * @Route(path="/do-update", name="app_user_doupdate")
     * @param Request $request
     */
    public function doUpdateAction(Request $request)
    {
        $m          = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:User');
        $id         = $request->get('id');
        $email      = $request->request->get('email');
        $password   = $request->request->get('password');
        $username   = $request->request->get('username');
        $user = $repository->find($id);
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setPassword($password);
        $m->flush();
        $this->redirectToRoute('app_usercontroller_index');
    }
    /**
     * @Route(path="/insert", name="app_user_insert")
     */
    public function insertAction()
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        return $this->render(':user:form.html.twig',
            [
                'form'      => $form->createView(),
                'action'    =>$this->generateUrl('app_user_doinsert')
            ]);
    }
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route(path="/done", name="app_user_doinsert")
     */
    public function doInsertAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);
        if ($form->isValid())
        {
            $m = $this->getDoctrine()->getManager();
            $m->persist($user);
            $m->flush();
            $this->addFlash('messages', 'User added');
            return $this->redirectToRoute('app_usercontroller_index');
        }
        $this->addFlash('messages', 'Review your form data');
        return $this->render(':user:form.html.twig',
            [
                'form'      => $form->createView(),
                'action'    => $this->generateUrl('app_user_doinsert')
            ]
        );
    }
    /**
     *
     * @Route(name="app_user_remove", path="/remove")
     */
    public function removeAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $repository = $m->getRepository('AppBundle:User');
        $user = $repository->find($id);
        $m->remove($user);
        $m->flush();
        $this->addFlash('messages', 'User has been removed');
        return $this->redirectToRoute('app_usercontroller_index');
    }
}