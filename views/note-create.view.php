<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<?php require('partials/banner.php') ?>
<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<p class="mb-6">
			<a href="/notes" class="text-blue-500 underline">Go back...</a>
		</p>

		<div>
			<form method="POST">
					<div class="col-span-full">
						<label for="body" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
						<div class="mt-2">
							<textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Here's an idea for a note..."><?= $_POST['body'] ?? '' ?></textarea>
							<p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?? '' ?></p>
						</div>
					</div>

				<div class="mt-6 flex items-center justify-end gap-x-6">
					<button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
				</div>
			</form>
		</div>
	</div>
</main>

<?php require('partials/footer.php') ?>