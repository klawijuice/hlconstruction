# HLCONSTRUCTION PROJECT

    Le backend se trouve sur le sous domain manager.fienibini.xxx/authenticate.
    Consulter le fichier RouteServiceProvider pour plus de détails

### AJOUTER AU FICHIER .env
    
    APP_PROD_DOMAIN=fienibini.com
    APP_LOCAL_DOMAIN=fienibini.local
    #
    RECAPTCHA_SITE_KEY="6LdfXu8ZAAAAAG5VUwEcNjTXXiZHRCNrdxMkKBeb"
    RECAPTCHA_SECRET_KEY="6LdfXu8ZAAAAAAUBMCWyCqvxtWxq4llrRTq3q5oo"

### CREATION DE L'ADMINISTRATEUR

    php artisan admin:set {NOM} {PRENOMS} {EMAIL} {MOT DE PASSE}



