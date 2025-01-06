<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert(
            [
//             Aqui está uma lista de categorias (tipos) de medicamentos, organizados com base em suas funções terapêuticas:

// 1. Analgésicos
// Usados para aliviar a dor.
// Exemplos: Paracetamol, Dipirona, Ibuprofeno.
// 2. Antibióticos
// Combatem infecções causadas por bactérias.
// Exemplos: Amoxicilina, Azitromicina, Ciprofloxacino.
// 3. Anti-inflamatórios
// Reduzem inflamações, dores e febres.
// Exemplos: Diclofenaco, Naproxeno, Cetoprofeno.
// 4. Antipiréticos
// Reduzem a febre.
// Exemplos: Paracetamol, Ibuprofeno, Ácido Acetilsalicílico.
// 5. Antialérgicos (Antihistamínicos)
// Tratam reações alérgicas.
// Exemplos: Loratadina, Cetirizina, Difenidramina.
// 6. Antidepressivos
// Tratam transtornos depressivos e de ansiedade.
// Exemplos: Fluoxetina, Sertralina, Amitriptilina.
// 7. Ansiolíticos
// Aliviam sintomas de ansiedade.
// Exemplos: Diazepam, Clonazepam, Alprazolam.
// 8. Antiparasitários
// Combatem parasitas, como vermes e protozoários.
// Exemplos: Albendazol, Metronidazol, Ivermectina.
// 9. Antivirais
// Tratam infecções causadas por vírus.
// Exemplos: Aciclovir, Oseltamivir, Tenofovir.
// 10. Antifúngicos
// Combatem infecções causadas por fungos.
// Exemplos: Fluconazol, Cetoconazol, Anfotericina B.
// 11. Anticoagulantes
// Previnem a formação de coágulos no sangue.
// Exemplos: Varfarina, Heparina, Rivaroxabana.
// 12. Anti-hipertensivos
// Tratam a pressão arterial alta.
// Exemplos: Losartana, Enalapril, Amlodipino.
// 13. Hipoglicemiantes
// Controlam os níveis de glicose no sangue.
// Exemplos: Metformina, Glibenclamida, Insulina.
// 14. Broncodilatadores
// Facilitam a respiração em doenças como asma e DPOC.
// Exemplos: Salbutamol, Ipratrópio, Teofilina.
// 15. Antieméticos
// Previnem e tratam náuseas e vômitos.
// Exemplos: Metoclopramida, Ondansetrona, Dimenidrinato.
// 16. Anticonvulsivantes
// Tratam convulsões e epilepsia.
// Exemplos: Fenitoína, Carbamazepina, Lamotrigina.
// 17. Diuréticos
// Aumentam a excreção de urina, reduzindo o excesso de líquidos.
// Exemplos: Furosemida, Hidroclorotiazida, Espironolactona.
// 18. Antipsicóticos
// Tratam transtornos psiquiátricos, como esquizofrenia e bipolaridade.
// Exemplos: Haloperidol, Risperidona, Olanzapina.
// 19. Imunossupressores
// Reduzem a atividade do sistema imunológico.
// Exemplos: Ciclosporina, Azatioprina, Tacrolimo.
// 20. Suplementos e Vitaminas
// Complementam a nutrição ou tratam deficiências específicas.
// Exemplos: Vitamina D, Ferro, Ácido Fólico.
// 21. Estimulantes
// Aumentam a atividade cerebral e/ou física.
// Exemplos: Metilfenidato, Cafeína, Modafinil.
                [
                    'name' => 'Analgésicos',
                    'description' => 'Usados para aliviar a dor.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Antibióticos',
                    'description' => 'Combatem infecções causadas por bactérias.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Anti-inflamatórios',
                    'description' => 'Reduzem inflamações, dores e febres.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Antipiréticos',
                    'description' => 'Reduzem a febre.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Antialérgicos (Antihistamínicos)',
                    'description' => 'Tratam reações alérgicas.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Antidepressivos',
                    'description' => 'Tratam transtornos depressivos e de ansiedade.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Ansiolíticos',
                    'description' => 'Aliviam sintomas de ansiedade.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Antiparasitários',
                    'description' => 'Combatem parasitas, como vermes e protozoários.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Antivirais',
                    'description' => 'Tratam infecções causadas por vírus.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Antifúngicos',
                    'description' => 'Combatem infecções causadas por fungos.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Anticoagulantes',
                    'description' => 'Previnem a formação de coágulos no sangue.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Anti-hipertensivos',
                    'description' => 'Tratam a pressão arterial alta.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Hipoglicemiantes',
                    'description' => 'Controlam os níveis de glicose no sangue.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Broncodilatadores',
                    'description' => 'Facilitam a respiração em doenças como asma e DPOC.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Antieméticos',
                    'description' => 'Previnem e tratam náuseas e vômitos.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Anticonvulsivantes',
                    'description' => 'Tratam convulsões e epilepsia.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Diuréticos',
                    'description' => 'Aumentam a excreção de urina, reduzindo o excesso de líquidos.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Antipsicóticos',
                    'description' => 'Tratam transtornos psiquiátricos, como esquizofrenia e bipolaridade.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Imunossupressores',
                    'description' => 'Reduzem a atividade do sistema imunológico.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Suplementos e Vitaminas',
                    'description' => 'Complementam a nutrição ou tratam deficiências específicas.',
                    'warranty' => 30
                ],
                [
                    'name' => 'Estimulantes',
                    'description' => 'Aumentam a atividade cerebral e/ou física.',
                    'warranty' => 30
                ],

            ]
        );
    }
}
