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
    tel_p int(10) not null,
    rib_p int(30) not null,
    role_p varchar(20) not null,
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

create table contrat(
    ref_c int(20) not null auto_increment,
    status_c varchar(30) not null,
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
    tel_c int(10) not null,
    rib_c int(30) not null,
    role_ce varchar(20) not null,
    primary key (id_c)
);

create table region(
    code_reg int(5) not null,
    nom_reg varchar(50) not null,
    primary key (code_reg)
);

create table reservation(
    
    ref_res int(5) not null auto_increment,
    date_res date not null,
    nb_perso int(2) not null,
    date_debut date not null,
    date_fin date not null,
    etat_res varchar(30) not null,
    id_c int(5) not null,
    ref_hab int(5) not null,
    code_reg int(5) not null,
    primary key (ref_res),
    foreign key (id_c) references client(id_c),
    foreign key (ref_hab) references habitation(ref_hab),
    foreign key (code_reg) references region(code_reg)
);

create table appartement(
    ref_hab int(5) not null,
    etage_ap int(2) not null,
    superficie_ap varchar(5),
    type_ap varchar(3),
    primary key (ref_hab)
);

create table maison(
    ref_hab int(5) not null,
    superficie_m varchar(5) not null,
    carac_m varchar(50) not null,
    primary key (ref_hab)
);

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