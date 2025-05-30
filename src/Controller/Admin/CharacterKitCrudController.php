<?php

namespace App\Controller\Admin;

use App\Entity\CharacterKit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CharacterKitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterKit::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield FormField::addTab('Leaks');
            yield BooleanField::new('leakedContent', 'Leaked content?');
            yield IntegerField::new('betaVersion', 'Beta Version (only leaks)');

        yield FormField::addTab('Base stats');
            yield NumberField::new('baseHp');
            yield NumberField::new('baseAtk');
            yield NumberField::new('baseDef');
            yield NumberField::new('baseSpd');

        yield FormField::addTab('Substats');
            yield AssociationField::new('substats');
            yield NumberField::new('statOneValue', 'Stat 1');
            yield NumberField::new('statTwoValue', 'Stat 2');
            yield NumberField::new('statThreeValue', 'Stat 3');

        yield FormField::addTab('Traces');
            yield TextField::new('levelOneTrace');
            yield TextField::new('ascensionTwoTrace');
            yield TextField::new('ascensionThreeTraceOne');
            yield Textfield::new('ascensionThreeTraceTwo');
            yield TextField::new('ascensionFourTrace');
            yield TextField::new('ascensionFiveTraceOne');
            yield TextField::new('ascensionFiveTraceTwo');
            yield TextField::new('ascensionSixTrace');
            yield TextField::new('levelSeventyFiveTrace');
            yield TextField::new('levelEightyTrace');
        
        yield FormField::addTab('Main Trace 1');
            yield TextField::new('mainTraceOneName', 'Name');
            yield TextEditorField::new('mainTraceOneDesc', 'Description');
            yield ImageField::new('mainTraceOneFilename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');
        
        yield FormField::addTab('Main Trace 2');
            yield TextField::new('mainTraceTwoName', 'Name');
            yield TextEditorField::new('mainTraceTwoDesc', 'Description');
            yield ImageField::new('mainTraceTwoFilename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

        yield FormField::addTab('Main Trace 3');
            yield TextField::new('mainTraceThreeName', 'Name');
            yield TextEditorField::new('mainTraceThreeDesc', 'Description');
            yield ImageField::new('mainTraceThreeFilename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

        yield FormField::addTab('Skills');
            yield AssociationField::new('skills');

        yield FormField::addTab('Eidolons');
            yield AssociationField::new('eidolons');

        yield FormField::addTab('Memosprite');
            yield AssociationField::new('memosprite')->renderAsEmbeddedForm();
    }
}
