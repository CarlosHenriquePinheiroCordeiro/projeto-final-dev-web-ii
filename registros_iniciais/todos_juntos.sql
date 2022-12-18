INSERT INTO `tipo_usuarios` (`id`,`nome`,`created_at`,`updated_at`) VALUES (1,'Administrador','2022-10-12 15:09:13','2022-10-12 15:09:13');
INSERT INTO `tipo_usuarios` (`id`,`nome`,`created_at`,`updated_at`) VALUES (2,'Professor','2022-10-12 15:09:32','2022-10-12 15:09:32');
INSERT INTO `tipo_usuarios` (`id`,`nome`,`created_at`,`updated_at`) VALUES (3,'Aluno','2022-10-12 15:09:44','2022-10-12 15:09:44');
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

INSERT INTO `pessoas` (`id`,`nome`,`data_nascimento`,`cpf`,`rg`,`created_at`,`updated_at`,`usuario_id`) VALUES (1,'admin','2022-10-16','12345678912','1234567','2022-10-16 13:56:17','2022-10-16 13:56:17',1);
INSERT INTO `pessoas` (`id`,`nome`,`data_nascimento`,`cpf`,`rg`,`created_at`,`updated_at`,`usuario_id`) VALUES (2,'ProfessorI','1990-10-16','12345678912','1234567','2022-10-16 13:56:45','2022-10-16 13:56:45',2);
INSERT INTO `pessoas` (`id`,`nome`,`data_nascimento`,`cpf`,`rg`,`created_at`,`updated_at`,`usuario_id`) VALUES (3,'ProfessorII','1995-10-16','12345678912','1234567','2022-10-16 13:57:15','2022-10-16 13:57:15',3);
INSERT INTO `pessoas` (`id`,`nome`,`data_nascimento`,`cpf`,`rg`,`created_at`,`updated_at`,`usuario_id`) VALUES (4,'AlunoI','2009-09-18','12345678912','1234567','2022-10-16 13:57:43','2022-10-16 13:57:43',4);
INSERT INTO `pessoas` (`id`,`nome`,`data_nascimento`,`cpf`,`rg`,`created_at`,`updated_at`,`usuario_id`) VALUES (5,'AlunoII','2010-03-09',NULL,NULL,'2022-10-16 13:58:06','2022-10-16 13:58:06',5);
INSERT INTO `pessoas` (`id`,`nome`,`data_nascimento`,`cpf`,`rg`,`created_at`,`updated_at`,`usuario_id`) VALUES (6,'AlunoIII','2005-08-08','12345678912','1234567','2022-10-16 13:58:35','2022-10-16 13:58:35',6);
INSERT INTO `estados` (`id`,`nome`,`sigla`,`created_at`,`updated_at`) VALUES (1,'Santa Catarina','SC','2022-10-16 13:59:47','2022-10-16 13:59:47');
INSERT INTO `estados` (`id`,`nome`,`sigla`,`created_at`,`updated_at`) VALUES (2,'Paraná','PR','2022-10-16 13:59:56','2022-10-16 13:59:56');
INSERT INTO `cidades` (`id`,`nome`,`created_at`,`updated_at`,`estado_id`) VALUES (1,'Ituporanga','2022-10-16 14:00:10','2022-10-16 14:00:10',1);
INSERT INTO `cidades` (`id`,`nome`,`created_at`,`updated_at`,`estado_id`) VALUES (2,'Rio do Sul','2022-10-16 14:00:17','2022-10-16 14:00:17',1);
INSERT INTO `cidades` (`id`,`nome`,`created_at`,`updated_at`,`estado_id`) VALUES (3,'Curitiba','2022-10-16 14:00:24','2022-10-16 14:00:24',2);
INSERT INTO `enderecos` (`pessoa_id`,`rua`,`bairro`,`numero`,`created_at`,`updated_at`,`cidade_id`) VALUES (2,'Uruguai','Jardim América','16','2022-10-16 14:01:57','2022-10-16 14:01:57',1);
INSERT INTO `enderecos` (`pessoa_id`,`rua`,`bairro`,`numero`,`created_at`,`updated_at`,`cidade_id`) VALUES (4,'Duque de Caxias','Jardim América','59','2022-10-16 14:10:37','2022-10-16 14:11:14',2);
INSERT INTO `professors` (`pessoa_id`,`created_at`,`updated_at`) VALUES (2,'2022-10-16 13:56:45','2022-10-16 13:56:45');
INSERT INTO `professors` (`pessoa_id`,`created_at`,`updated_at`) VALUES (3,'2022-10-16 13:57:15','2022-10-16 13:57:15');
INSERT INTO `alunos` (`pessoa_id`,`created_at`,`updated_at`) VALUES (4,'2022-10-16 13:57:43','2022-10-16 13:57:43');
INSERT INTO `alunos` (`pessoa_id`,`created_at`,`updated_at`) VALUES (5,'2022-10-16 13:58:06','2022-10-16 13:58:06');
INSERT INTO `alunos` (`pessoa_id`,`created_at`,`updated_at`) VALUES (6,'2022-10-16 13:58:35','2022-10-16 13:58:35');
INSERT INTO `disciplinas` (`id`,`nome`,`descricao`,`created_at`,`updated_at`) VALUES (1,'IMPORTADA','DISCIPLINA PARA SALA VIRTUAL IMPORTADA DO CANVAS','2022-10-16 14:14:23','2022-10-16 14:14:23');
INSERT INTO `disciplinas` (`id`,`nome`,`descricao`,`created_at`,`updated_at`) VALUES (2,'DevWeb II','Desenvolvimento Web II','2022-10-16 14:14:33','2022-10-16 14:17:03');
INSERT INTO `sala_virtuals` (`id`,`nome`,`descricao`,`disciplina_id`,`created_at`,`updated_at`) VALUES (1,'Desenvolvimento Web I - A','Desenvolvimento Web I para a turma A',1,'2022-10-16 14:27:20','2022-10-16 14:27:20');
INSERT INTO `sala_virtuals` (`id`,`nome`,`descricao`,`disciplina_id`,`created_at`,`updated_at`) VALUES (2,'Desenvolvimento Web II - B','Desenvolvimento Web II para a turma B',2,'2022-10-16 14:29:05','2022-10-16 14:29:05');
INSERT INTO `sala_virtual_professors` (`pessoa_id`,`sala_virtual_id`, `ativo`,`created_at`,`updated_at`) VALUES (2,1,1,'2022-10-16 14:37:12','2022-10-16 14:37:12');
INSERT INTO `sala_virtual_professors` (`pessoa_id`,`sala_virtual_id`, `ativo`,`created_at`,`updated_at`) VALUES (3,2,1,'2022-10-16 14:37:18','2022-10-16 14:37:18');
INSERT INTO `sala_virtual_alunos` (`pessoa_id`,`sala_virtual_id`,`ativo`,`created_at`,`updated_at`) VALUES (6,1,1,'2022-10-16 14:37:12','2022-10-16 14:37:12');
INSERT INTO `sala_virtual_alunos` (`pessoa_id`,`sala_virtual_id`,`ativo`,`created_at`,`updated_at`) VALUES (6,2,1,'2022-10-16 14:37:18','2022-10-16 14:37:18');
INSERT INTO `registro_aulas` (`id`,`descricao`,`data`,`qtd_aula`,`sala_virtual_id`,`pessoa_id`,`created_at`,`updated_at`) VALUES (1,'Primeira Aula - Plano de Ensino','2022-10-16',5,1,2,'2022-10-16 16:19:28','2022-10-16 16:19:28');
INSERT INTO `registro_aula_alunos` (`registro_aula_id`,`pessoa_id`,`presenca`, `created_at`,`updated_at`) VALUES (1, 6, 4,'2022-10-16 16:19:28','2022-10-16 16:19:28');
