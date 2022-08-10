<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\User;

class AdminPanelController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="ROLE_ADMIN")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('EnUygun E-Commerce');
    }

    public function configureMenuItems(): iterable
    {    
        yield MenuItem::section('Admin Panel');
        yield MenuItem::linkToCrud('Categories', 'fa fa-file-text', Category::class);
        yield MenuItem::linkToCrud('Product', 'fa fa-tags', Product::class);       
    }
}
