<?php if ($init) : ?>
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=<?= $key ?>"></script>
<?php endif ?>

<script type="text/javascript">
    grecaptcha.ready(function() {
        grecaptcha.execute('<?= $key ?>', <?= json_encode($options) ?>).then(function(token) {
            document.getElementById('<?= $id ?>').value = token;
        });

        // refresh get token before it's expire every 90s
        setInterval(function() {
            grecaptcha.execute('<?= $key ?>', <?= json_encode(array_merge($options, ['action' => 'request_call_back'])) ?>).then(function(token) {
                document.getElementById('<?= $id ?>').value = token;
            });
        });
    });
</script>
