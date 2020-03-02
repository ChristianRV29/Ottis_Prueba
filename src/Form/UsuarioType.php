<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Usuario;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


use FOS\CKEditorBundle\Form\Type\CKEditorType;

class UsuarioType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder
            ->add('nombre', TextType::class, array('label' => 'Nombre del usuario '))
            ->add('apellido', TextType::class, array('label' => 'Apellido del usuario '))
            ->add('sexo', TextType::class, array('label'=> 'Sexo(F-M) '))
            //->add('sexo', ChoiceType::class, array('label' => ['choices' => ['Femenino'=>'F',
            //'Masculino'=>'M'],]))
            ->add('correo', EmailType::class, array('label' => 'Correo electrónico '))
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Contraseña '),
                'second_options' => array('label' => 'Confirmar contraseña ')))
            ->add('rol', TextType::class, array('label' => 'Rol del usuario (1-Admin, 2-Normal, 3-Auditor)'))
            ->add('guardar', SubmitType::class, array('label'=>'Crear usuario'));
    
    }
}
