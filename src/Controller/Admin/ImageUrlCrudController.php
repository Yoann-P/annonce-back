<?php

namespace App\Controller\Admin;

use App\Entity\ImageUrl;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImageUrlCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImageUrl::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('url',)
                ->setLabel("Image")
                ->setHelp("Image du modél")
                ->setUploadedFileNamePattern("[year]-[month]-[day]-[contenthash].[extension]")
                ->setBasePath("/uploads")
                ->setUploadDir("/public/uploads")

        ];
    }
}
