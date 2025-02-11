<?php

namespace App\Controller\Admin;

use App\Entity\CharacterSkill;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CharacterSkillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CharacterSkill::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPageTitle('new', 'New Skill')->setPageTitle('index', 'Skills')->setPageTitle('edit', 'Edit current Skill');
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');

        yield FormField::addTab('Skill');
            yield FormField::addRow();
                yield TextField::new('name')->setColumns(5);
                yield AssociationField::new('characterKit')->setColumns(5);
                yield BooleanField::new('enhanced', 'Enhanced?')->setColumns(2);
                yield ChoiceField::new('type')->setChoices([
                    "Basic ATK" => "Basic ATK",
                    "Skill" => "Skill",
                    "Ultimate" => "Ultimate",
                    "Talent" => "Talent",
                ])->setColumns(6);
                yield ChoiceField::new('tag')->setChoices([
                    "AoE" => "AoE",
                    "Blast" => "Blast",
                    "Bounce" => "Bounce",
                    "Defense" => "Defense",
                    "Enhance" => "Enhance",
                    "Impair" => "Impair",
                    "Restore" => "Restore",
                    "Single Target" => "Single Target",
                    "Summon" => "Summon",
                    "Support" => "Support"
                ])->setColumns(6);
                yield IntegerField::new('energyGain')->setColumns(3)->hideOnIndex();
                yield IntegerField::new('energyCost')->setColumns(3)->hideOnIndex();
                yield IntegerField::new('breakMainTarget')->setColumns(3)->hideOnIndex();
                yield IntegerField::new('breakAdjacentTargets')->setColumns(3)->hideOnIndex();
                yield TextEditorField::new('descLevelOne', "Description (lvl 1)")->setColumns(7)->hideOnIndex();
                yield ImageField::new('filename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]')->setColumns(5);
        
        yield FormField::addTab('Basic ATK');
            yield FormField::addColumn();
                yield TextEditorField::new('descLevelTwo', "Description (lvl 2)")->hideOnIndex();
                yield TextEditorField::new('descLevelThree', "Description (lvl 3)")->hideOnIndex();
                yield TextEditorField::new('descLevelFour', "Description (lvl 4)")->hideOnIndex();
            yield FormField::addColumn();
                yield TextEditorField::new('descLevelFive', "Description (lvl 5)")->hideOnIndex();
                yield TextEditorField::new('descLevelSix', "Description (lvl 6)")->hideOnIndex();
                yield TextEditorField::new('descLevelSeven', "Description (lvl 7)")->hideOnIndex();

        yield FormField::addTab('Others');
            yield FormField::addColumn();
                yield TextEditorField::new('descLevelEight', "Description (lvl 8)")->hideOnIndex();
                yield TextEditorField::new('descLevelNine', "Description (lvl 9)")->hideOnIndex();
                yield TextEditorField::new('descLevelTen', "Description (lvl 10)")->hideOnIndex();
            yield FormField::addColumn();
                yield TextEditorField::new('descLevelEleven', "Description (lvl 11)")->hideOnIndex();
                yield TextEditorField::new('descLevelTwelve', "Description (lvl 12)")->hideOnIndex();
    }
}
