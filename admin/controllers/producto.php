<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'productos' )
	->fields(
		Field::inst( 'Nombre' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Se requiere un nombre para el producto' )	
			) ),
		Field::inst( 'Descripcion' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Se require una descripcion del producto' )	
			) ),
		Field::inst( 'Precio' )
			->validator( Validate::numeric() )
			->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'Existencia' )
			->validator( Validate::numeric() )
			->setFormatter( Format::ifEmpty(null) )
	)
	->debug(true)
	->process( $_POST )
	->json();
