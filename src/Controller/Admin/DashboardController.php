<?php

namespace App\Controller\Admin;

use App\Entity\Path;
use App\Entity\Stat;
use App\Entity\Type;
use App\Entity\Version;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/fledgless', routeName: 'fledgless')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hsr Project');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Characters');

        yield MenuItem::section('Associations');
            yield MenuItem::subMenu('Versions', 'fas fa-square-root-variable')->setSubItems([
                MenuItem::linkToCrud('Version list', 'fas fa-v', Version::class),
                MenuItem::linkToCrud('New version', 'fas fa-calendar-plus', Version::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Paths', 'fas fa-road')->setSubItems([
                MenuItem::linkToCrud('Path list', 'fas fa-lines-leaning', Path::class),
                MenuItem::linkToCrud('New path', 'fas fa-road-circle-check', Path::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Types', 'fas fa-wand-sparkles')->setSubItems([
                MenuItem::linkToCrud('Type list', 'fas fa-hat-wizard', Type::class),
                MenuItem::linkToCrud('New type', 'fas fa-fire-flame-curved', Type::class)->setAction(Crud::PAGE_NEW),
            ]);
            yield MenuItem::subMenu('Stats','fas fa-chart-column')->setSubItems([
                MenuItem::linkToCrud('Stat list', 'fas fa-list-check', Stat::class),
                MenuItem::linkToCrud('New stat', 'fas fa-heart-circle-plus', Stat::class)->setAction(Crud::PAGE_NEW),
            ]);
    }
}
