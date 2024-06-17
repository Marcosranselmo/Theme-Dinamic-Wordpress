<!-- Informações -->

<div class="informacoes">Informações</div>

<div class="site-rodape">
    <div class="container">
        <div class="localizacao">
        <h6>Localização</h6>
        <!-- <a href=""><img src="./img/icone-localização.png" alt=""></a> -->
            <p><?php echo esc_html(get_theme_mod('set_localizacao', __('Configure o endereço da empresa', 
            'wp-devs'))); ?></p>
        </div>
        <div class="horario-atendimento">
        <h6>Horário Atendimento</h6>
            <p><?php echo esc_html(get_theme_mod('set_horario-atendimento', __('Configure o horário de atendimento da empresa', 
            'wp-devs'))); ?></p>
        </div>
    </div>
</div>

<!-- Fale Conosco -->

<div class="informacoes">Fale conosco</div>

<div class="site-rodape">
    <div class="container">
        <div class="tel-fixo">
        <h6>Telefone Fixo</h6>
        <!-- <a href=""><img src="./img/icone-localização.png" alt=""></a> -->
            <p><?php echo esc_html(get_theme_mod('set_tel-fixo', __('Configure o tel. fixo da empresa', 
            'wp-devs'))); ?></p>
        </div>
        <div class="whatsapp">
        <h6>WhatsApp</h6>
            <p><?php echo esc_html(get_theme_mod('set_whatsapp', __('Configure o whasapp da empresa', 
            'wp-devs'))); ?></p>
        </div>
        <div class="email">
        <h6>E-mail</h6>
            <p><?php echo esc_html(get_theme_mod('set_email', __('Configure o email da empresa', 
            'wp-devs'))); ?></p>
        </div>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="copyright">
            <p><?php echo esc_html(get_theme_mod('set_copyright', __('Copyright X - All 
                    Rights Reserved', 'wp-devs'))); ?></p>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>