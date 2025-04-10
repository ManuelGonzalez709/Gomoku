# Juego 5 en Raya - PHP Multijugador

Este es un proyecto de **5 en Raya** multijugador, desarrollado en PHP como parte del primer año del ciclo formativo de **Desarrollo de Aplicaciones Multiplataforma (DAM)**. El juego permite que dos jugadores se enfrenten en un tablero de 15x15 casillas con el objetivo de alinear 5 fichas consecutivas, ya sea de manera horizontal, vertical o diagonal.

## Características

- **Juego multijugador**: Dos jugadores se enfrentan entre sí.
- **Tablero interactivo**: Un tablero de 15x15 donde los jugadores pueden colocar sus fichas.
- **Lógica de juego**: El primer jugador en alinear 5 fichas consecutivas gana.
- **Guardado de partidas**: Las partidas pueden ser guardadas y continuadas en otro momento.
- **Interfaz amigable**: Interfaz sencilla y clara para una experiencia de juego cómoda.

## Requisitos

- Servidor web con soporte PHP (por ejemplo, Apache o Nginx).
- Base de datos MySQL para almacenar las partidas y usuarios.
- Navegador web moderno.

## Instalación

1. **Clona el repositorio**:

    ```bash
    git clone https://github.com/tu_usuario/5-en-raya-php.git
    ```

2. **Configura el servidor web**:
   Asegúrate de que el servidor web tenga PHP y soporte para bases de datos MySQL.

3. **Configura la base de datos**:
   Crea una base de datos MySQL y configura las credenciales de la base de datos en el archivo `config.php`.

4. **Accede al juego**:
   Accede al juego a través de tu navegador web utilizando la dirección de tu servidor.

## Uso

1. **Registrar un usuario**: Crea una cuenta para poder empezar a jugar.
2. **Iniciar una partida**: Elige un oponente y comienza a jugar.
3. **Jugar**: Alterna turnos con tu oponente para colocar tus fichas en el tablero. El primer jugador en alinear 5 fichas consecutivas gana.

## Tecnologías utilizadas

- **PHP**: Lenguaje de programación principal para el backend.
- **MySQL**: Base de datos para almacenar partidas y usuarios.
- **HTML/CSS**: Para la interfaz de usuario.
- **JavaScript**: Para la interacción en tiempo real del tablero.

## Contribuciones

Si deseas contribuir al proyecto, puedes hacerlo de la siguiente manera:

1. Haz un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature-nueva-caracteristica`).
3. Realiza tus cambios.
4. Haz un commit de tus cambios (`git commit -am 'Añadir nueva característica'`).
5. Empuja los cambios a tu repositorio (`git push origin feature-nueva-caracteristica`).
6. Abre un pull request.

## Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

## Autor

**Manuel González Pérez**  
[GitHub](https://github.com/ManuelGonzalez709)  
