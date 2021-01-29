create table company(
company_name varchar(100), 
company_manager varchar(50), 
company_phone varchar(30), 
company_email varchar(70) primary key, 
company_city varchar(50), 
company_state varchar(50), 
company_postcode varchar(15), 
company_password varchar(60)
);


create table building(
company_email varchar(70),
building_name varchar(100),
building_number int primary key,
building_address varchar(100),
building_city varchar(50),
building_state varchar(50),
building_post_code varchar(20),
building_status char(6),
building_invoice blob,
foreign key(company_email) references company(company_email)
);


create table building_data(
building_number int,
contractor_name varchar(50),
contractor_phone varchar(50),
unit varchar(50),
data_date date,
in_time time,
out_time time,
contractor_comment text,
pic blob,
foreign key(building_number) references building(building_number)
);

create table admin(
admin_email varchar(70) primary key,
admin_password varchar(70)
);

create table qr_codes(
building_number int,
qr_type text,
qr_status char(6),
qr_invoice blob,
foreign key(building_number) references building(building_number)
);


create table payment_building(
building_number int,
payment_pic blob,
payment_time varchar(5),
foreign key(building_number) references building(building_number)
)
