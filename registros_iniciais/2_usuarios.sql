/*
-- Query: select * from users
LIMIT 0, 1000

-- Date: 2022-10-16 13:34
*/
/*senha: admin */
INSERT INTO `users` (`id`,`name`,`email`,`password`,`terms`, `tipo_usuario_id`,`created_at`,`updated_at`) VALUES (1, 'admin'      , 'admin@gmail.com', '$2y$10$WbdaY5fY3cmks6OsaiMU1ucVOixiX9Biz/5J0bVQzNogR95KRL/4y', 1, 1, '2022-10-16 13:56:17','2022-10-16 13:56:17');

/*senha: professor1 */
INSERT INTO `users` (`id`,`name`,`email`,`password`,`terms`, `tipo_usuario_id`,`created_at`,`updated_at`) VALUES (2, 'ProfessorI' , 'prof1@gmail.com', '$2y$10$uCIBknljyGBgSQngl9X2Wu5/hUh4BnSEep9FVR2Abat7IgdEQ8vcK', 1, 2,'2022-10-16 13:56:45','2022-10-16 13:56:45');

/*senha: professor2 */
INSERT INTO `users` (`id`,`name`,`email`,`password`,`terms`, `tipo_usuario_id`,`created_at`,`updated_at`) VALUES (3, 'ProfessorII', 'prof2@gmail.com', '$2y$10$rqIM2ygo4KwVbjsAEyWuT.fwaqh7YT6iHf0nDX49nUxVuYaAn3JG6', 1, 2,'2022-10-16 13:57:15','2022-10-16 13:57:15');

/*senha: alunoteste1 */
INSERT INTO `users` (`id`,`name`,`email`,`password`,`terms`, `tipo_usuario_id`,`created_at`,`updated_at`) VALUES (4, 'AlunoI'     , 'alu1@gmail.com' , '$2y$10$LmZ5JyXYWEA3ZEk5ofXwieVPxqgcMxnUtWCaJ1TWaNicZXGdifwT6', 1, 3,'2022-10-16 13:57:43','2022-10-16 13:57:43');

/*senha: alunoteste2 */
INSERT INTO `users` (`id`,`name`,`email`,`password`,`terms`, `tipo_usuario_id`,`created_at`,`updated_at`) VALUES (5, 'AlunoII'    , 'alu2@gmail.com' , '$2y$10$WXDS6KrdFB5uo0EWL6fX9eDKcGyz4xCNj7gO/SN0uZ0WNTv1nN/Mm', 1, 3,'2022-10-16 13:58:06','2022-10-16 13:58:06');

/*senha: alunoteste3 */
INSERT INTO `users` (`id`,`name`,`email`,`password`,`terms`, `tipo_usuario_id`,`created_at`,`updated_at`) VALUES (6, 'AlunoIII'   , 'alu3@gmail.com' , '$2y$10$TbETKtPlbYl27.PuLOlu0eUczvxcEZ6cyR1P0JiNMVHXjoK/b.Cba', 1, 3,'2022-10-16 13:58:35','2022-10-16 13:58:35');
