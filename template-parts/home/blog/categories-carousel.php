<div class="flex flex-row md:px-6">

    <div class="cursor-pointer flex-none group relative border-2 border-gray-300 rounded-full py-2 px-6 mr-4 hover:border-purple-darken"
        onclick="new blogPosts(0)" serma-post-category="0">
        <p class="text-black group-hover:text-purple-darken font-medium text-center" serma-post-category-label="0">
            Todos
        </p>
    </div>
    <?php foreach($args['news_category'] as $category) : ?>

    <div class="cursor-pointer flex-none group relative border-2 border-gray-300 rounded-full py-2 px-6 mr-4 hover:border-purple-darken"
        onclick="new blogPosts({id: <?= $category['id'] ?>})" serma-post-category="<?= $category['id'] ?>">
        <p class="text-black group-hover:text-purple-darken font-medium text-center" serma-post-category-label="<?= $category['id'] ?>">
            <?= $category['name']?>
        </p>
    </div>

    <?php endforeach ?>
</div>