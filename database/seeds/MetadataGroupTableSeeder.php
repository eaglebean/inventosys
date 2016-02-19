<?php
use App\Models\Metadata;
use App\Models\MetadataGroup;
use Illuminate\Database\Seeder;

class MetadataGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [

            [
                'label' => 'Inventario',
                'description' => 'Metadatos para definir ubicaciones de inventario',
            ],
            [
                'label' => 'Racks',
                'description' => 'Mtadatos para definir ubicaciones en racks',
            ],
            [
                'label' => 'Racks',
                'description' => 'Mtadatos para definir ubicaciones en racks',
            ],
            [
                'label' => 'Bodegas',
                'description' => 'Mtadatos para definir ubicaciones en bodegas. Por ejemplo: GDL,CANCUN, etc',
            ],
            [
                'label' => 'Roles',
                'description' => 'Mtadatos para definir roles de usuario. Por ejemplo: Administrador, Supervisor, etc',
            ],
            [
                'label' => 'Grupo de recursos',
                'description' => 'Metadatos para definir grupos de recursos. Estos recursos seran utilizados para definir los privilegios que cada usario tiene, por ejemplo: Ordenes, Inventario, Usuarios',
            ],
            [
                'label' => 'Recurso',
                'description' => 'Metadatos para definir recursos. Por ejemplo: Crear, Borrar, Leer, Buscar, etc',
            ],
            [
                'label' => 'Status',
                'description' => 'Metadatos para definir status. Por ejemplo: Abierto, Completo, etc',
                'childs' => [
                    [
                        'label' => 'Abierto',
                        'description' => 'Par de calzado',
                    ],
                    [
                        'label' => 'Cerrado',
                        'description' => '',
                    ],
                    [
                        'label' => 'Pendiente',
                        'description' => '',
                    ],
                    [
                        'label' => 'Error',
                        'description' => '',
                    ],
                ],
            ],

            // Metadata Color
            [
                'label' => 'Color',
                'description' => 'Colores disponibles para productos',
                'childs' => [
                    [
                        'label' => 'Blanco',
                        'description' => '',
                    ],
                    [
                        'label' => 'Cafe',
                        'description' => '',
                    ],
                    [
                        'label' => 'Negro',
                        'description' => '',
                    ],
                    [
                        'label' => 'Naranja',
                        'description' => '',
                    ],
                    [
                        'label' => 'Coral',
                        'description' => '',
                    ],
                    [
                        'label' => 'Azul',
                        'description' => '',
                    ],
                    [
                        'label' => 'Plata',
                        'description' => '',
                    ],
                    [
                        'label' => 'Oro',
                        'description' => '',
                    ],
                    [
                        'label' => 'Multicolor',
                        'description' => '',
                    ],

                ],
            ],

            // Metadata Size
            [
                'label' => 'Talla',
                'description' => 'Tallas disponibles para productos',
                'childs' => [
                    [
                        'label' => '24.0',
                        'description' => '',
                    ],
                    [
                        'label' => '25.0',
                        'description' => '',
                    ],
                    [
                        'label' => '26.0',
                        'description' => '',
                    ],

                ],
            ],

            // Metadata footwear type
            [
                'label' => 'Tipo de calzado',
                'description' => 'Prefijo para producto',
                'childs' => [
                    [
                        'label' => 'SD',
                        'description' => 'Sandalia Dama',
                    ],
                    [
                        'label' => 'SC',
                        'description' => 'Sandalia Caballero',
                    ],
                    [
                        'label' => 'SN',
                        'description' => 'Sandalia Nino',
                    ],

                ],
            ],

            // Metadata unit
            [
                'label' => 'Tipo unidad',
                'description' => 'Prefijo para producto',
                'childs' => [
                    [
                        'label' => 'PAR',
                        'description' => 'Par de calzado',
                    ],
                    [
                        'label' => 'PZ',
                        'description' => '',
                    ],
                    [
                        'label' => 'Singular',
                        'description' => '',
                    ],
                ],
            ],
        ];
        $childs = [];

        foreach ($seeds as $seed) {
            //  Get childs if any
            if (array_key_exists('childs', $seed)) {
                foreach ($seed['childs'] as $child) {
                    $childs[] = new Metadata($child);
                }
                unset($seed['childs']);
            }

            //  Create parent and childs
            $parent = MetadataGroup::create($seed);

            if (count($childs) > 0) {
                $parent->childs()->saveMany($childs);

                //  Clean array
                $childs = [];
            }

        }
    }
}
