drop table dues;
create table dues(
    
    student_email   varchar(100),
    Jan_21          int(5),
    Feb_21          int(5),
    March_21        int(5),
    April_21        int(5),
    May_21          int(5),
    Jun_21          int(5),
    July_21         int(5),
    Aug_21          int(5),
    Sep_21          int(5),
    Oct_21          int(5),
    Nov_21          int(5),
    Dec_21          int(5),
    Jan_22          int(5) 

);

insert into dues(student_email, Jan_21, Feb_21, March_21, April_21, May_21, Jun_21, July_21, Aug_21, Sep_21, Oct_21, Nov_21, Dec_21, Jan_22) values ('user1@gmail.com', 1000, 1000, 1000, 1000, 1000, 1000,1000, 1000, 1000, 1000, 1000, 1000, 0);
insert into dues(student_email, Jan_21, Feb_21, March_21, April_21, May_21, Jun_21, July_21, Aug_21, Sep_21, Oct_21, Nov_21, Dec_21, Jan_22) values ('user2@gmail.com', 1000, 1000, 1000, 1000, 1000, 1000,1000, 1000, 1000, 1000, 1000, 1000, 0);
insert into dues(student_email, Jan_21, Feb_21, March_21, April_21, May_21, Jun_21, July_21, Aug_21, Sep_21, Oct_21, Nov_21, Dec_21, Jan_22) values ('user3@gmail.com', 1000, 1000, 1000, 1000, 1000, 1000,1000, 1000, 1000, 1000, 1000, 1000, 0);
insert into dues(student_email, Jan_21, Feb_21, March_21, April_21, May_21, Jun_21, July_21, Aug_21, Sep_21, Oct_21, Nov_21, Dec_21, Jan_22) values ('user4@gmail.com', 1000, 1000, 1000, 1000, 1000, 1000,1000, 1000, 1000, 1000, 1000, 1000, 0);
insert into dues(student_email, Jan_21, Feb_21, March_21, April_21, May_21, Jun_21, July_21, Aug_21, Sep_21, Oct_21, Nov_21, Dec_21, Jan_22) values ('user5@gmail.com', 1000, 1000, 1000, 1000, 1000, 1000,1000, 1000, 1000, 1000, 1000, 1000, 0);


alter table fee alter Jan_21 set default 1000;
alter table fee alter Feb_21 set default 1000;
alter table fee alter March_21 set default 1000;
alter table fee alter April_21 set default 1000;
alter table fee alter May_21 set default 1000;
alter table fee alter Jun_21 set default 1000;
alter table fee alter July_21 set default 1000;
alter table fee alter Aug_21 set default 1000;
alter table fee alter Sep_21 set default 1000;
alter table fee alter Oct_21 set default 1000;
alter table fee alter Nov_21 set default 1000;
alter table fee alter Dec_21 set default 1000;
alter table fee alter Jan_22 set default 1000;
alter table fee alter Feb_22 set default 1000;