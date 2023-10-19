'custom' => [
    'telephone' => [
        'required' => 'Le numéro de téléphone est obligatoire.',
        'numeric' => 'Le numéro de téléphone doit être un nombre.',
    ],
   
        'titre'=> [
        'required'=>'le titre est oblligatoire.',
        'string'=>'le titre doit etre une chaine de caractere',
        ],
        'description'=>[
            'required'=>'la description est oblligatoire.',
        'string'=>'le description doit etre une chaine de caractere',
        
            ],
            'name'=>[
            'unique'=>'cette categorie existe deja !!'
            ]
            
    // Autres messages d'erreur personnalisés ici
],