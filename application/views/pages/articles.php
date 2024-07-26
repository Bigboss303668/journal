<div class="uk-container uk-margin-small-top">
    <div class="uk-margin-medium-top" uk-grid>
        <div class="uk-width-1">
            <div class="uk-container">
                <div class="uk-card uk-card-default uk-card-body">
                    <?php foreach ($volumes as $volume) : ?>
                        <h2><?= $volume['vol_name'] ?></h2>
                        <p><?= $volume['description'] ?></p>
                        <?php foreach ($volume['articles'] as $article) : ?>
                            <div class="uk-background-muted uk-padding uk-panel uk-margin-medium-top">
                                <!-- <div class="uk-card-badge uk-label">Badge</div> -->
                                <img class="uk-align-left uk-margin-remove-adjacent" src="<?= base_url('assets/images/volumes/'. $volume['coverImg']) ?>" width="225" height="200" alt="Example image">
                                <h1 class="uk-margin-medium-top uk-margin-small-bottom" style="font-family: Poppins; font-size: 16px; font-weight: bold;"><?= $article['title'] ?></h1>
                                <p><?= strlen($article['abstract'] ?? '') > 230 ? substr($article['abstract'] ?? '', 0, 230).'...' : $article['abstract'] ?? '' ?></p>
                                <p class="uk-text-small">Author(s): <span style="font-style: italic;"><?= $article['author_names'] ?></span></p>
                                <p class="uk-text-small uk-link-muted">doi: <a href="<?= base_url('./uploads/'.$article['filename']); ?>" target="_blank" style="font-style: italic;"><?= $article['doi'] ?></a></p>
                                <!-- <p class="uk-text-small"><?= $article['date_published'] ?></p> -->

                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
