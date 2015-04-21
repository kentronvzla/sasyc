<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();
        $this->call('ConfiguracionSeeder');
        $this->call('NivelAcademicoTableSeeder');
        $this->call('OrganismoTableSeeder');
        $this->call('ParentescoTableSeeder');
        //$this->call('RecepcionTableSeeder');
        $this->call('ReferenteTableSeeder');
        $this->call('TenenciaTableSeeder');
        $this->call('TipoAyudaTableSeeder');
        $this->call('AreaTableSeeder');
        $this->call('TipoViviendaTableSeeder');
        //$this->call('RecaudoTableSeeder');
        $this->call('TipoNacionalidadTableSeeder');
        $this->call('EstadoCivilTableSeeder');
        $this->call('TipoRequerimientoTableSeeder');
        //$this->call('RequerimientoTableSeeder');
        $this->call('EstadoTableSeeder');
        $this->call('MunicipioTableSeeder');
        $this->call('ParroquiaTableSeeder');
        $this->call('GruposTableSeeder');
        $this->call('DepartamentoTableSeeder');
        $this->call('UsersTableSeeder');
    }

}
