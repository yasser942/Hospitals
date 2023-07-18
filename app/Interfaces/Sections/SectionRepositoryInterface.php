<?php
     namespace App\Interfaces\Sections;
     use http\Env\Request;

     interface SectionRepositoryInterface {

         public function index();
         public function store($request);
         public function update ($request);
         public function destroy ( $request);

     }
