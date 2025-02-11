<?php

namespace App\Controller\Admin;

use App\Entity\MemospriteSkill;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MemospriteSkillCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MemospriteSkill::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setPageTitle('new', 'New Memo-skill')->setPageTitle('index', 'Memo-skills')->setPageTitle('edit', 'Edit current Memo-skill');
    }

    public function configureFields(string $pageName): iterable
    {
        $mediaDir = $this->getParameter('medias_directory');
        $uploadDir = $this->getParameter('uploads_directory');
        
        yield FormField::addTab('Skill');
            yield FormField::addRow();
                yield TextField::new('name')->setColumns(5);
                yield AssociationField::new('memosprite')->setColumns(5);
                yield BooleanField::new('levelUp', 'Unique desc?')->setColumns(2);
            yield FormField::addRow();
                yield ChoiceField::new('type')->setChoices([
                    "Skill" => "Skill",
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
            yield FormField::addRow();
                yield IntegerField::new('energyGain')->setColumns(4)->hideOnIndex();
                yield IntegerField::new('breakMainTarget')->setColumns(4)->hideOnIndex();
                yield IntegerField::new('breakAdjacentTargets')->setColumns(4)->hideOnIndex();
            yield FormField::addRow();
                yield TextEditorField::new('descUnique', "Description (if skill doesn't level up)")->setColumns(7)->hideOnIndex();
                yield ImageField::new('filename', 'Icon')->setBasePath($uploadDir)->setUploadDir($mediaDir)->setUploadedFileNamePattern('[slug]-[uuid].[extension]')->setColumns(5);
        
        yield FormField::addTab('Level-up');
            yield FormField::addColumn();
            yield TextEditorField::new('descLevelOne', "Description (lvl 1)")->hideOnIndex();
                yield TextEditorField::new('descLevelTwo', "Description (lvl 2)")->hideOnIndex();
                yield TextEditorField::new('descLevelThree', "Description (lvl 3)")->hideOnIndex();
                yield TextEditorField::new('descLevelFour', "Description (lvl 4)")->hideOnIndex();
            yield FormField::addColumn();
                yield TextEditorField::new('descLevelFive', "Description (lvl 5)")->hideOnIndex();
                yield TextEditorField::new('descLevelSix', "Description (lvl 6)")->hideOnIndex();
                yield TextEditorField::new('descLevelSeven', "Description (lvl 7)")->hideOnIndex();
    }
}
