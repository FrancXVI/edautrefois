<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           TextField::new('name')->setLabel('Nom du produit'),
           SlugField::new('slug')->setTargetFieldName('name'),
           TextareaField::new('description')->setLabel('Description du produit'),
           MoneyField::new('price')->setLabel('Prix du produit')->setCurrency('EUR'),
           IntegerField::new('stock')->setLabel('Stock'),
           ImageField::new('images')->setBasePath('images/')->setLabel('Photos du produit')->setUploadDir('public/images/')->setUploadedFileNamePattern('[randomhash].[extension]')->setRequired(false),
           DateField::new('createdAt')->setLabel('Date de création')->hideOnForm(),

        ];
    }
    
}
