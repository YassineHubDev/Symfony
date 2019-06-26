<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * Affiche le détail d'un produit
     * @Route (
     *     "/produit/{slug}",
     *     requirements={"slug"="[a-z0-9\-]+"})
     * @return Response
     */
    public function show(string $slug): Response
    {
        var_dump($slug);
        dump($slug);

        return $this->render('product/show.html.twig');
    }

    /**
     * Affiche le détail de "create"
     * @Route (
     *     "/produit/create",
     *     methods={"GET", "POST"})
     * @param string $slug
     * @return Response
     */
    public function create(Request $requestHTTP): Response
    {
        dump($requestHTTP->request);
        return $this->render('product/create.html.twig');
    }

    public function index(): Response
    {
        //Récupération du repository des produits
        $repository = $this->getDoctrine()
            ->getRepository(Product::class);
        //Récupération de tous les produits
        $products = $repository->findAll();
        //Renvoie des produits à la vue
        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }
}
