<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>
<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<p class="mb-6">
			<a href="/notes" class="text-blue-500 underline">Go back...</a>
		</p>

		<div>
			<?= htmlspecialchars($note["body"]) ?>
		</div>

		<div class="flex gap-x-2">
			<form class="mt-6" method="GET" action="/note/edit">
				<input type="hidden" name="id" value="<?= $note['id'] ?>">
				<button class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-500">Edit</button>
			</form>
	
			<form class="mt-6" method="POST" action="/notes">
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="id" value="<?= $note['id'] ?>">
				<button class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
			</form>
		</div>
	</div>
</main>

<?php require base_path('views/partials/footer.php') ?>