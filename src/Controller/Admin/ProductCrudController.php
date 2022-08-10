<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('product_name'),
            TextField::new('product_description'),
            NumberField::new('product_count'),
            NumberField::new('product_price'),
            ImageField::new('product_img')
            ->setBasePath('assets/images/products')
            ->setUploadDir('public/assets/images/products')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
            AssociationField::new('category'),

        ];
    }
}