<?php
namespace App\Form;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class SujetFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('Titre')
            ->add('Catégorie', ChoiceType::class,['choices'=> $options,
            'choice_value'=>'id',
            'choice_label'=>'nom'
            ])
            ->add('Corps');
    }
}