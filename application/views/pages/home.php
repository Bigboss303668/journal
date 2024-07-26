<style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }

    .uk-container {
      padding: 20px;
    }

    .uk-card-title {
      color: #2a3b2e;
      font-size: 40px;
      font-weight: bold;
    }

    .uk-card-body {
      color: #2a3b2e;
    }

    .uk-card-default {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .uk-card-default:hover {
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    }

    .uk-card-media-right {
      max-width: 50%;
      margin-left: auto;
      margin-right: 0;
    }

    .uk-card-media-right img {
      width: 100%;
      height: auto;
      display: block;
    }

    .uk-background-muted {
      background-color: #f0f0f0;
      padding: 20px;
      margin-bottom: 20px;
    }

    .uk-table-divider tbody tr {
      border-bottom: 1px solid #ddd;
    }

    .uk-table-hover tbody tr:hover {
      background-color: #e9ecef;
    }

    .uk-card-badge {
      background-color: #437EF7;
      color: #fff;
      font-size: 14px;
      padding: 4px 8px;
      border-radius: 4px;
      margin-bottom: 6px;
      display: inline-block;
    }
  </style>
</head>
<div class="uk-container uk-margin-medium-top">
    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
            <img src="<?= base_url('assets/img/about.jpg') ?>" alt="" uk-cover>
            <canvas width="600" height="400"></canvas>
        </div>
        <div>
            <div class="uk-card-body">
                <h3 class="uk-card-title" style="color: #000000; font-size: 40px; font-weight: bold;">About</h3>
                <p>The publication of Science is an interdisciplinary peer-reviewed publication that publishes research articles from a variety of authors in the natural sciences, mathematics, engineering, and social sciences. Original research pieces, brief communications, technical notes, review articles, and viewpoints from all academic fields are all welcome. The journal is open-access and adheres to ethical and scientific publishing guidelines.</p>
            </div>
        </div>
    </div>
    <div class="uk-margin-medium-top" uk-grid>
        <div class="uk-width-3-4">
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
        <div class="uk-width-1-4">
            <div class="uk-card uk-card-default uk-card-body uk-background-muted">
                <div class="uk-container uk-margin-small-bottom">
                </div>
                <div class="uk-container uk-margin-small-bottom uk-margin-medium-top">
                <h3 style="color: #437EF7; font-size: 20px; font-weight: bold;">Volumes</h3>
                <table class="uk-table uk-table-hover uk-table-divider">
                    <tbody>
                        <?php foreach ($volumes as $volume) : ?>
                            <tr>
                                <td><?= $volume['vol_name'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>