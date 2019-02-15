<?php
// src/Blogger/BlogBundle/Controller/PlaylistController.php

namespace Blogger\BlogBundle\Controller;

use Proxies\__CG__\Blogger\BlogBundle\Entity\Playlist;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Blog controller.
 */
class PlaylistController extends Controller
{
    /**
     * Show a playlist entry
     */
//    public function showAction($id)
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $playlist = $em->getRepository('BloggerBlogBundle:Playlist')->find($id);
//
//        if (!$playlist) {
//            throw $this->createNotFoundException('Unable to find playlist post.');
//        }
//
//        return $this->render('BloggerBlogBundle:Playlist:show.html.twig', array(
//            'playlist' => $playlist,
//        ));
//    }

    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $playlist = $em->createQueryBuilder()
            ->select('b')
            ->from('BloggerBlogBundle:Playlist', 'b')
            ->addOrderBy('b.created', 'DESC')
            ->getQuery()
            ->getArrayResult();

        $singerList = Playlist::getDistinctField($em, 'singer');
        $genreList = Playlist::getDistinctField($em, 'genre');
        $yearList = Playlist::getDistinctField($em, 'year');
        $response = new Response(json_encode(compact('playlist', 'singerList', 'genreList', 'yearList')));
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Content-Type', 'application/json');

        return $response;

//        return $this->render('BloggerBlogBundle:Page:index.html.twig', array(
//            'playlist' => $playlist,
//            'singerList' => $singerList,
//            'genreList' => $genreList,
//            'yearList' => $yearList
//        ));
    }
}