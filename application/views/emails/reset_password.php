<p>
    Hi <?=@$data['last_name']?>,
</p>
<p>

    We have received request to reset your password. Please click the link or copy the link and paste in URL.
    <br><a href="<?=@base_url('/reset_password?key=' . @$data['verification_code'])?>" style="color: #2e8ece">
        <?=@base_url('/reset_password?key=' . @$data['verification_code'])?>
    </a>
</p>
<p>
    Kind Regards,
    <br>HANDI-EXPRESS.FR
</p>