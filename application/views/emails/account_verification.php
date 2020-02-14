<p>
    Hi <?=@$data['name']?>,
</p>
<p>
    Please verify you account by clicking on link or copy the link and paste in URL.
    <br><a href="<?=@base_url('/verify?key=' . @$data['verification_code'])?>" style="color: #2e8ece">
        <?=@base_url('/verify?key=' . @$data['verification_code'])?>
    </a>
</p>
<p>
    Kind Regards,
    <br>Handi Express Support
</p>