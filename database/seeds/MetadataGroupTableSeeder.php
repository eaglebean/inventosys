<?php

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
        ];

        foreach ($seeds as $seed) {
            MetadataGroup::create($seed);
        }
    }
}
