<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'splendeur' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1~$kZ/NNhaR, P#r}O@AMPiGIQR$a$R;: F;FA~FNym3p&ZnACWO~g@@6Wd3#;+H' );
define( 'SECURE_AUTH_KEY',  '$CX0QDv_:f%5=^ Ja/o=gv:mK[w7@8P*jq/Jlmosm0Ctu4Vvk7yQ$h<9zDx?1PU#' );
define( 'LOGGED_IN_KEY',    'A[uTKw( B]nWXt=H)OSi&,G9}jN=|O{Gt<,nSl|PA;P$hHP7VHYO|<_.a$Y~G:;n' );
define( 'NONCE_KEY',        'OwI#CJNBGr$PtkNlKn;zN{OvLtU{*9:/ax?+oM)u9/~giH RXd<V=)^Y ^U @cl!' );
define( 'AUTH_SALT',        'JUxYOZg_/^ABh>t:_4}jv=:CB^JApSPO@pv(N$(3-DB_($m>Y~8f]I::-.>.x,%g' );
define( 'SECURE_AUTH_SALT', 'tdtb[vIra4IAf{BMU/H!>RFM+PMepfN(DCUW-|@|8c^9AS6IK5Cno.:E 6/)2qyg' );
define( 'LOGGED_IN_SALT',   'tlQ03LLtHY5L;6CnNKN~r^n1#fV ~%ZfcY7io1[bmu^3.cZz*R:Q;$[&*<r!!Q(F' );
define( 'NONCE_SALT',       'aGTmBeDQ8d$z1`t/_WT%.l5).eVu`$NL_y)EEQbKNWb]H0^?z:Da}j5$g&y~,,Q{' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');

// SMTP Config
define( 'WPMS_ON', true );
define( 'WPMS_SMTP_PASS', 'Ikro24blan89' );
