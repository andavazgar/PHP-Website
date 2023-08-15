<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$currentUserId = 1;


// Find the corresponding note
$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail();

// Authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);


view('notes/edit.view.php', [
	'heading' => 'Edit Note',
	'errors' => [],
	'note' => $note
]);