<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->insert(
            [
// Aqui está uma lista de categorias (tipos) de medicamentos, organizados com base em suas funções terapêuticas:

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
                    // 'sku' => '0000001',
                    'name' => 'Paracetamol',
                    'description' => 'Usado para aliviar a dor.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(50,100),
                    'category_id' => 1,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321001,
                    'sold' => 0,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000002',
                    'name' => 'Dipirona',
                    'description' => 'Usado para aliviar a dor.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(50,100),
                    'category_id' => 1,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321002,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000003',
                    'name' => 'Ibuprofeno',
                    'description' => 'Usado para aliviar a dor.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(50,100),
                    'category_id' => 1,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321003,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000004',
                    'name' => 'Amoxicilina',
                    'description' => 'Combatem infecções causadas por bactérias.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(50,100),
                    'category_id' => 2,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321004,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000005',
                    'name' => 'Azitromicina',
                    'description' => 'Combatem infecções causadas por bactérias.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(200,300),
                    'category_id' => 2,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321005,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000006',
                    'name' => 'Ciprofloxacino',
                    'description' => 'Combatem infecções causadas por bactérias.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(200,300),
                    'category_id' => 2,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321006,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000007',
                    'name' => 'Diclofenaco',
                    'description' => 'Reduzem inflamações, dores e febres.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(200,300),
                    'category_id' => 3,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321007,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000008',
                    'name' => 'Naproxeno',
                    'description' => 'Reduzem inflamações, dores e febres.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(200,300),
                    'category_id' => 3,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321008,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000009',
                    'name' => 'Cetoprofeno',
                    'description' => 'Reduzem inflamações, dores e febres.',
                    // 'price' => rand(1000000,
                    'price' =>  rand(200,300),
                    'category_id' => 3,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321009,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000010',
                    'name' => 'Paracetamol',
                    'description' => 'Reduzem a febre.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(200,300),
                    'category_id' => 4,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321010,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000011',
                    'name' => 'Ibuprofeno',
                    'description' => 'Reduzem a febre.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(200,300),
                    'category_id' => 4,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321011,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000012',
                    'name' => 'Ácido Acetilsalicílico',
                    'description' => 'Reduzem a febre.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(200,300),
                    'category_id' => 4,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321012,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
                [
                    // 'sku' => '0000013',
                    'name' => 'Loratadina',
                    'description' => 'Tratam reações alérgicas.',
                    // 'price' => rand(1000000, 100000000),
                    'price' =>  rand(200,300),
                    'category_id ' => 5,
                    'photo' => 'images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg',
                    'stocks' => 6,
                    'criticalLevel' => 2,
                    // 'serialno' => 654321013,
                    'sold' => 0
                    ,
                    'supplier_id' => 1
                ],
            ]
        );
    }
}
