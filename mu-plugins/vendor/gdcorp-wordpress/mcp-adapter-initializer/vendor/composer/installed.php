<?php return array(
    'root' => array(
        'name' => 'gdcorp-wordpress/mcp-adapter-initializer',
        'pretty_version' => 'v0.2.2',
        'version' => '0.2.2.0',
        'reference' => '4529d40cc29b39e2060ef4d820c9629b8ff1653d',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => false,
    ),
    'versions' => array(
        'auth-contrib/php-auth-library' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => 'b912f8661d8c656642c0a9db37c58355490d2380',
            'type' => 'library',
            'install_path' => __DIR__ . '/../auth-contrib/php-auth-library',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => false,
        ),
        'gdcorp-wordpress/mcp-adapter-initializer' => array(
            'pretty_version' => 'v0.2.2',
            'version' => '0.2.2.0',
            'reference' => '4529d40cc29b39e2060ef4d820c9629b8ff1653d',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
