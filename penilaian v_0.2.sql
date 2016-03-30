/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     27/03/2016 0:21:31                           */
/*==============================================================*/


drop table if exists JABATAN;

drop table if exists KARYAWAN;

drop table if exists KATEGORI_PELATIHAN;

drop table if exists KEHADIRAN;

drop table if exists KRITERIA;

drop table if exists KRITERIA_PENILAIAN;

drop table if exists KRITERIA_PENILAIAN_KARYAWAN;

drop table if exists OUTLET;

drop table if exists PELATIHAN;

drop table if exists PENILAIAN;

drop table if exists PERIODE_KEHADIRAN_DAN_PENILAIAN;

drop table if exists RANGE_KRITERIA;

drop table if exists REKOMENDASI_PELATIHAN;

/*==============================================================*/
/* Table: JABATAN                                               */
/*==============================================================*/
create table JABATAN
(
   ID_JABATAN           varchar(20) not null,
   NAMA_JABATAN         varchar(100),
   GOLONGAN             varchar(20),
   AKSES                varchar(20),
   LEVEL                int,
   primary key (ID_JABATAN)
);

/*==============================================================*/
/* Table: KARYAWAN                                              */
/*==============================================================*/
create table KARYAWAN
(
   ID_KARYAWAN          varchar(20) not null,
   ID_JABATAN           varchar(20),
   ID_OUTLET            varchar(20),
   NAMA_KARYAWAN        varchar(100),
   STATUS_KARYAWAN      varchar(20),
   JENIS_KELAMIN        varchar(50),
   USERNAME2            varchar(50),
   PASSWORD             varchar(50),
   primary key (ID_KARYAWAN)
);

/*==============================================================*/
/* Table: KATEGORI_PELATIHAN                                    */
/*==============================================================*/
create table KATEGORI_PELATIHAN
(
   ID_KATEGORI          varchar(20) not null,
   NAMA_KATEGORI        varchar(100),
   primary key (ID_KATEGORI)
);

/*==============================================================*/
/* Table: KEHADIRAN                                             */
/*==============================================================*/
create table KEHADIRAN
(
   ID_KEHADIRAN         varchar(10) not null,
   ID_PERIODE2          varchar(15),
   ID_KARYAWAN          varchar(20),
   TERLAMBAT            varchar(100),
   ABSEN                varchar(100),
   SAKIT                varchar(100),
   primary key (ID_KEHADIRAN)
);

/*==============================================================*/
/* Table: KRITERIA                                              */
/*==============================================================*/
create table KRITERIA
(
   ID_KRITERIA          varchar(10) not null,
   ID_RANGE_KRITERIA    varchar(10),
   NAMA_KRITERIA        varchar(100),
   BOBOT                decimal,
   primary key (ID_KRITERIA)
);

/*==============================================================*/
/* Table: KRITERIA_PENILAIAN                                    */
/*==============================================================*/
create table KRITERIA_PENILAIAN
(
   ID_KRITERIA          varchar(10) not null,
   ID_PELATIHAN         varchar(10) not null,
   primary key (ID_KRITERIA, ID_PELATIHAN)
);

/*==============================================================*/
/* Table: KRITERIA_PENILAIAN_KARYAWAN                           */
/*==============================================================*/
create table KRITERIA_PENILAIAN_KARYAWAN
(
   ID_KRITERIA          varchar(10) not null,
   ID_PENILAIAN         varchar(15) not null,
   NILAI                varchar(20),
   DASAR_PENILAIAN      varchar(100),
   primary key (ID_KRITERIA, ID_PENILAIAN)
);

/*==============================================================*/
/* Table: OUTLET                                                */
/*==============================================================*/
create table OUTLET
(
   ID_OUTLET            varchar(20) not null,
   NAMA_OUTLET          varchar(100),
   primary key (ID_OUTLET)
);

/*==============================================================*/
/* Table: PELATIHAN                                             */
/*==============================================================*/
create table PELATIHAN
(
   ID_PELATIHAN         varchar(10) not null,
   ID_KATEGORI          varchar(20),
   NAMA_PELATIHAN       varchar(100),
   KETERANGAN_PELATIHAN varchar(100),
   primary key (ID_PELATIHAN)
);

/*==============================================================*/
/* Table: PENILAIAN                                             */
/*==============================================================*/
create table PENILAIAN
(
   ID_PENILAIAN         varchar(15) not null,
   ID_PERIODE2          varchar(15),
   ID_KARYAWAN          varchar(20),
   KAR_ID_KARYAWAN      varchar(20),
   KETERANGAN_PENILAIAN varchar(100),
   PENILAIAN_TOTAL      varchar(20),
   primary key (ID_PENILAIAN)
);

/*==============================================================*/
/* Table: PERIODE_KEHADIRAN_DAN_PENILAIAN                       */
/*==============================================================*/
create table PERIODE_KEHADIRAN_DAN_PENILAIAN
(
   ID_PERIODE2          varchar(15) not null,
   NAMA_PERIODE         varchar(50),
   AWAL                 date,
   AKHIR                date,
   KETERANGAN           varchar(100),
   primary key (ID_PERIODE2)
);

/*==============================================================*/
/* Table: RANGE_KRITERIA                                        */
/*==============================================================*/
create table RANGE_KRITERIA
(
   ID_RANGE_KRITERIA    varchar(10) not null,
   NILAI_RANGE_KRITERIA varchar(100),
   DESKRIPSI_KRITERIA   varchar(500),
   primary key (ID_RANGE_KRITERIA)
);

/*==============================================================*/
/* Table: REKOMENDASI_PELATIHAN                                 */
/*==============================================================*/
create table REKOMENDASI_PELATIHAN
(
   ID_PELATIHAN         varchar(10) not null,
   ID_PENILAIAN         varchar(15) not null,
   primary key (ID_PELATIHAN, ID_PENILAIAN)
);

alter table KARYAWAN add constraint FK_MEMILIKI_3 foreign key (ID_JABATAN)
      references JABATAN (ID_JABATAN);

alter table KARYAWAN add constraint FK_MENGISI foreign key (ID_OUTLET)
      references OUTLET (ID_OUTLET);

alter table KEHADIRAN add constraint FK_MEMILIKI foreign key (ID_PERIODE2)
      references PERIODE_KEHADIRAN_DAN_PENILAIAN (ID_PERIODE2);

alter table KEHADIRAN add constraint FK_MEMPUNYAI foreign key (ID_KARYAWAN)
      references KARYAWAN (ID_KARYAWAN);

alter table KRITERIA add constraint FK_RELATIONSHIP_9 foreign key (ID_RANGE_KRITERIA)
      references RANGE_KRITERIA (ID_RANGE_KRITERIA);

alter table KRITERIA_PENILAIAN add constraint FK_KRITERIA_PENILAIAN foreign key (ID_KRITERIA)
      references KRITERIA (ID_KRITERIA);

alter table KRITERIA_PENILAIAN add constraint FK_KRITERIA_PENILAIAN2 foreign key (ID_PELATIHAN)
      references PELATIHAN (ID_PELATIHAN);

alter table KRITERIA_PENILAIAN_KARYAWAN add constraint FK_RELATIONSHIP_13 foreign key (ID_KRITERIA)
      references KRITERIA (ID_KRITERIA);

alter table KRITERIA_PENILAIAN_KARYAWAN add constraint FK_RELATIONSHIP_15 foreign key (ID_PENILAIAN)
      references PENILAIAN (ID_PENILAIAN);

alter table PELATIHAN add constraint FK_RELATIONSHIP_14 foreign key (ID_KATEGORI)
      references KATEGORI_PELATIHAN (ID_KATEGORI);

alter table PENILAIAN add constraint FK_MEMILIKI_2 foreign key (KAR_ID_KARYAWAN)
      references KARYAWAN (ID_KARYAWAN);

alter table PENILAIAN add constraint FK_RELATIONSHIP_10 foreign key (ID_KARYAWAN)
      references KARYAWAN (ID_KARYAWAN);

alter table PENILAIAN add constraint FK_RELATIONSHIP_12 foreign key (ID_PERIODE2)
      references PERIODE_KEHADIRAN_DAN_PENILAIAN (ID_PERIODE2);

alter table REKOMENDASI_PELATIHAN add constraint FK_MEREKOMENDASIKAN foreign key (ID_PELATIHAN)
      references PELATIHAN (ID_PELATIHAN);

alter table REKOMENDASI_PELATIHAN add constraint FK_MEREKOMENDASIKAN2 foreign key (ID_PENILAIAN)
      references PENILAIAN (ID_PENILAIAN);

