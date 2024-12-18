<?php

namespace App\Controller\Admin;

use App\Entity\Models;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ModelsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Models::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Modéle')
            ->setEntityLabelInPlural('Modéles');
    }


    public function configureFields(string $pageName): iterable
    {
        $required = true;
        if ($pageName == "edit") {
            $required = false;
        }

        return [

            TextField::new('name', "Modéle"),
            SlugField::new('slug')->setLabel('Url')->setTargetFieldName('name')->setHelp('Url de la catégorie généré automatiquement'),
            TextEditorField::new('description'),
            NumberField::new("years", "Année"),
            NumberField::new("km", "Km"),
            ChoiceField::new("gearbox")
                ->setLabel("Transmission")
                ->setChoices([
                    "Manuelle" => "Manuelle",
                    "Automatique" => "Automatique",
                ]),
            ChoiceField::new("nrj")
                ->setLabel("Énergie")
                ->setChoices([
                    "Diesel" => "Diesel",
                    "Essence" => "Essence",
                    "Electrique" => "Electrique",
                ]),
            TextField::new("fiscalpower", "Puissance fiscale"),
            TextField::new("dinpower", "Puissance DIN"),
            NumberField::new("price", "Prix"),
            AssociationField::new('brand', "Marque du modéle"),
            ImageField::new('illustration')
                ->setLabel("Image")
                ->setHelp("Image du modél")
                ->setUploadedFileNamePattern("[year]-[month]-[day]-[contenthash].[extension]")
                ->setBasePath("/uploads")
                ->setUploadDir("/public/uploads")
                ->setRequired($required),

        ];
    }
}
