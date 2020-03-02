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

use FOS\CKEditorBundle\Form\Type\CKEditorType;

class UsuarioType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder
            ->add('nombre', TexType::class, array('label' => 'Nombre del usuario: '))
            ->add('apellido', TexType::class, array('label' => 'Apellido del usuario: '))
            ->add('sexo', ChoiceType::class, array('label' => ['opciones' => ['Femenino'=>'F',
            'Masculino'=>'M'],])
            ->add('correo', TexType::class, array('label' => 'Correo: '))
            ->add('password', TexType::class, array('label' => 'Apellido del usuario: ')));
        /*
        
        $builder 
        -> add('nombre', TextType::class, array('label'=> 'Nombre del proyecto:'))
        -> add('descripcion', CKEditorType::class, array('label'=> 'Descripción del proyecto: '))
        -> add('fecha_Inicio', DateTimeType::class , array('label'=> 'Fecha y hora de inicio:'))
        -> add('fecha_Finalizacion', DateTimeType::class , array('label'=> 'Fecha aproximada de cierre:'))
        //-> add('imagen', FileType::class, array('attr'=>array('onchange'=> 'onChange(event)')))
        -> add('guardar',SubmitType::class, array('label' => 'Crear proyecto'));

        */
    }
}
