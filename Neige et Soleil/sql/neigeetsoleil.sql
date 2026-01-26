drop database if exists neigeetsoleil;
create database neigeetsoleil;
use neigeetsoleil;

create table proprietaire(
    id_p int(5) not null auto_increment,
    nom_p varchar(20) not null,
    prenom_p varchar(20) not null,
    email_p varchar(70) not null,
    mdp_p varchar(50) not null,
    adr_p varchar(120) not null,
    cp_p int(5) not null,
    ville_p varchar(50) not null,
    tel_p varchar(10) not null,
    rib_p varchar(30) not null,
    primary key (id_p)
);

create table habitation(
    ref_hab int(5) not null auto_increment,
    type_hab varchar(20) not null,
    adr_hab varchar(120) not null,
    cp_hab int(5) not null,
    ville_hab varchar(50) not null,
    tarif_hab_bas float(5) not null,
    tarif_hab_moy float(5) not null,
    tarif_hab_hau float(5) not null,
    surface varchar(10) not null,
    id_p int(5) not null,
    primary key (ref_hab),
    foreign key (id_p) references proprietaire(id_p)
);
/* 
    Faire : "ALTER TABLE habitation ENGINE=InnoDB;" pour que la table photos supporte
    ref_hab en clés etrangere
 */

create table contrat(
    ref_c int(20) not null auto_increment,
    status_c enum("En validation","En cours","Annule","Resilie"),
    annee_c int(4) not null,
    id_p int(5) not null,
    ref_hab int(5) not null,
    primary key (ref_c),
    foreign key (id_p) references proprietaire(id_p),
    foreign key (ref_hab) references habitation(ref_hab)
);

create table client(
    id_c int(5) not null auto_increment,
    nom_c varchar(25) not null,
    prenom_c varchar(25) not null,
    email_c varchar(70) not null,
    mdp_c varchar(50) not null,
    adr_c varchar(120) not null,
    cp_c int(5) not null,
    ville_c varchar(50) not null,
    tel_c varchar(10) not null,
    rib_c varchar(30) not null,
    primary key (id_c)
);

create table region(
    code_reg int(5) not null,
    nom_reg varchar(50) not null,
    primary key (code_reg)
);

drop table reservation;
create table reservation(
    ref_res int(5) not null auto_increment,
    date_res date not null,
    nb_perso int(2) not null,
    date_debut date not null,
    date_fin date not null,
    etat_res enum("Validee","En attente","Annulee"),
    id_c int(5) not null,
    ref_hab int(5) not null,
    primary key (ref_res),
    foreign key (id_c) references client(id_c),
    foreign key (ref_hab) references habitation(ref_hab)
);


create table appartement(
    ref_hab int(5) not null auto_increment,
    type_hab varchar(20) not null,
    adr_hab varchar(120) not null,
    cp_hab int(5) not null,
    ville_hab varchar(50) not null,
    tarif_hab_bas float(5) not null,
    tarif_hab_moy float(5) not null,
    tarif_hab_hau float(5) not null,
    surface varchar(10) not null,
    id_p int(5) not null,
    etage_ap int(2) not null,
    type_ap varchar(3),
    primary key (ref_hab)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

create table maison(
    ref_hab int(5) not null auto_increment,
    type_hab varchar(20) not null,
    adr_hab varchar(120) not null,
    cp_hab int(5) not null,
    ville_hab varchar(50) not null,
    tarif_hab_bas float(5) not null,
    tarif_hab_moy float(5) not null,
    tarif_hab_hau float(5) not null,
    surface varchar(10) not null,
    id_p int(5) not null,
    carac_m varchar(50) not null,
    primary key (ref_hab)
) ENGINE = InnoDB CHARSET = utf8mb4;

create table image(
    ref_image int(5) not null auto_increment,
    url_image varchar(200) not null,
    ref_hab int(5) not null,
    primary key (ref_image),
    foreign key (ref_hab) references habitation(ref_hab)
);


create table station(
    num_sta int(5) not null auto_increment,
    nom_sta varchar(50) not null,
    code_reg int(5) not null,
    primary key (num_sta),
    foreign key (code_reg) references region(code_reg)
);

create table activite(
    num_sta int(5) not null,
    num_acti int(5) not null,
    nom_acti varchar(50) not null,
    tarif_acti float(5) not null,
    primary key (num_sta,num_acti),
    foreign key (num_sta) references station(num_sta)
);

create table admin (
    Id_a int(5) not null auto_increment,
    nom_a varchar(50) not null,
    prenom_a varchar(50) not null,
    email_a varchar(100) not null,
    mdp_a varchar(200) not null, 
    role_a varchar(50) not null,
    primary key(Id_a)
);



create table archiveReservation as 
select r.*, curdate() archiDate from reservation r 
where 2=0;

alter table archiveReservation
add primary key (ref_res);

create table archiveContrat as 
select c.*, curdate() archiDate from contrat c 
where 2=0;

alter table archiveContrat
add primary key (ref_c);

create table if not exists photos(
    id_photo int not null auto_increment,
    ref_hab int not null,
    url_photo varchar(255) not null,
    is_principal boolean default false,
    primary key(id_photo),
    foreign key(ref_hab) references habitation(ref_hab) on delete cascade on update cascade
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

drop trigger if exists insert_maison;
delimiter //
create trigger insert_maison
before insert on maison for each row BEGIN
    if new.ref_hab is null or new.ref_hab in (select ref_hab from habitation) or new.ref_hab = 0 
    then
   set new.ref_hab = ifnull((select ref_hab from habitation where ref_hab >= all
    (select ref_hab from habitation)), 0) +1 ;
end if;
insert into habitation values(new.ref_hab,new.type_hab,new.adr_hab,new.cp_hab,new.ville_hab,new.tarif_hab_bas,new.tarif_hab_moy,new.tarif_hab_hau,new.surface,new.id_p);
end //
delimiter ;

drop trigger if exists insert_appart;
delimiter //
create trigger insert_appart
before insert on appartement for each row BEGIN
    if new.ref_hab is null or new.ref_hab in (select ref_hab from habitation) or new.ref_hab = 0 
    then
   set new.ref_hab = ifnull((select ref_hab from habitation where ref_hab >= all
    (select ref_hab from habitation)), 0) +1 ;
end if;
insert into habitation values(new.ref_hab,new.type_hab,new.adr_hab,new.cp_hab,new.ville_hab,new.tarif_hab_bas,new.tarif_hab_moy,new.tarif_hab_hau,new.surface,new.id_p);
end //
delimiter ;

drop trigger if exists update_maison;
delimiter //
create trigger update_maison
before update on maison for each row BEGIN
    update habitation set ref_hab=new.ref_hab,type_hab=new.type_hab,adr_hab=new.adr_hab,cp_hab=new.cp_hab,ville_hab=new.ville_hab,tarif_hab_bas=new.tarif_hab_bas,tarif_hab_moy=new.tarif_hab_moy,tarif_hab_hau=new.tarif_hab_hau,surface=new.surface,id_p=new.id_p where habitation.ref_hab=new.ref_hab;
end //
delimiter ;

drop trigger if exists update_appart;
delimiter //
create trigger update_appart
before update on appartement for each row BEGIN
    update habitation set ref_hab=new.ref_hab,type_hab=new.type_hab,adr_hab=new.adr_hab,cp_hab=new.cp_hab,ville_hab=new.ville_hab,tarif_hab_bas=new.tarif_hab_bas,tarif_hab_moy=new.tarif_hab_moy,tarif_hab_hau=new.tarif_hab_hau,surface=new.surface,id_p=new.id_p where habitation.ref_hab=new.ref_hab;
end //
delimiter ;


drop trigger if exists delete_maison;
delimiter //
create trigger delete_maison
before delete on maison for each row BEGIN
    delete from habitation where habitation.ref_hab=old.ref_hab;
end //
delimiter ;

drop trigger if exists delete_appart;
delimiter //
create trigger delete_appart
before delete on appartement for each row BEGIN
    delete from habitation where habitation.ref_hab=old.ref_hab;
end //
delimiter ;


DROP PROCEDURE IF EXISTS archiRes;
DELIMITER //
CREATE PROCEDURE archiRes()
BEGIN
    INSERT INTO archiveReservation
    SELECT r.*, CURDATE()
    FROM reservation r
    WHERE r.etat_res = 'Validee';
END //
DELIMITER ;

drop trigger if exists histoRes;
delimiter //
create trigger histoRes
after update on reservation
for each row 
begin 
call archiRes;
end // 
delimiter ;

DROP PROCEDURE IF EXISTS archiCon;
DELIMITER //
CREATE PROCEDURE archiCon()
BEGIN
    INSERT INTO archiveContrat
    SELECT c.*, CURDATE()
    FROM contrat c
    WHERE c.status_c = 'Annule' or 'Resilie';
END //
DELIMITER ;

drop trigger if exists histoCon;
delimiter //
create trigger histoCon
after update on contrat
for each row 
begin 
call archiCon;
end // 
delimiter ;

set global event_scheduler = on;

drop event if exists deleteRes;
delimiter //
create or replace event deleteRes
on schedule every 1 minute
do 
begin 
delete from reservation
where etat_res = 'Validee'
and ref_res in (select ref_res from archivereservation);
end//
delimiter ;

drop event if exists deleteCon;
delimiter //
create or replace event deleteCon
on schedule every 1 minute
do 
begin 
delete from contrat
where status_c = 'Annule' or 'Resilie'
and ref_c in (select ref_c from archiveContrat);
end//
delimiter ;