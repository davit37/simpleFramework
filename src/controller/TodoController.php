<?php

namespace ModernFramework\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ModernFramework\Model\Todo;
use Symfony\Component\HttpFoundation\RedirectResponse;


class TodoController extends Controller
{
    public function index()
    {
        return $this->render('index.html.twig', ['todos'=>$this->getModel(Todo::class)->findAll()]);
    }

    public function new(Request $request)
    {
        $activity = $request->get('activity');
        if($activity){
            $todo = $this->getModel(Todo::class);
            $todo->setActivity($activity);
            $todo->save();

            return new RedirectResponse('/todo');
        }

        return $this->render('new.html.twig');
    }

    public function done($id)
    {
        $todo =$this->getModel(Todo::class)->find((int)$id);
        if(!$todo)
        {
            return new Response('Halaman tidak ditemukan', Response::HTTP_NOT_FOUND);

        }

        $todo->done();
        $todo->save();
        return new RedirectResponse('/todo');
    }

    public function edit(Request $request, $id)
    {
        $todo = $this->getModel(Todo::class)->find($id);
        if(!$todo)
        {
            return new Response('Halaman tidak ditemukan', Response::HTTP_NOT_FOUND);
        }

        if(Request::METHOD_POST === $request->getMethod())
        {
            $todo->setActivity($request->get('activity'));
            $todo->save();
            return new RedirectResponse('/todo');
        }
        return $this->render('edit.html.twig',['todo'=>$todo]);
        
    }

    public function delete($id)
    {
        $todo = $this->getModel(Todo::class)->find($id);
        if(!$todo){
            return new Response('Halaman tidak ditemukan', Response::HTTP_NOT_FOUND);
        }

        $todo->delete();

        return new RedirectResponse('/todo');
    }
}