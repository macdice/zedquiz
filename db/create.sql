CREATE TABLE participant (
       id serial primary key,
       username text not null,
       password text not null,
       email text not null,
       first_name text not null,
       last_name text not null,
       date_of_birth date not null,
       location text not null,
       created timestamptz not null,
       updated timestamptz not null,
       last_seen timestamptz not null
);

CREATE TABLE agent (
       id serial primary key,
       first_name text not null,
       last_name text not null,
       email text not null,
       username text not null,
       password text not null,
       created timestamptz not null,
       updated timestamptz not null,
       last_seen timestamptz not null
);

CREATE TABLE region (
       id serial primary key,
       name text not null
);

CREATE TABLE business (
       id serial primary key,
       display_name text not null,
       display_phone text not null,
       display_email text not null,
       display_url text null,
       blurb text not null,
       facebook_url text null,
       twitter_handle text null,
       logo_url text null,
       logo_width integer null,
       logo_height integer null,
       company_name text not null,
       contact_person text not null,
       contact_email text not null,
       contact_phone text not null,
       postal_address text not null,
       postal_city text not null,
       postal_postcode text not null,
       region integer not null references region(id),
       agent integer not null references agent(id),
       created timestamptz not null,
       updated timestamptz not null
);

CREATE TABLE quiz (
       id serial primary key,
       name text not null,
       start_date date not null,
       end_date date not null
);

CREATE TABLE question (
       quiz integer not null references quiz(id),
       id integer not null,
       business integer not null references business(id),
       body text not null,
       created timestamptz not null,
       primary key (quiz, id)
);

CREATE TABLE possible_answer (
       id serial primary key,
       quiz integer not null,
       question integer not null,
       body text not null,
       correct boolean not null
);

ALTER TABLE possible_answer ADD CONSTRAINT possible_answer_question_fk FOREIGN KEY (quiz, question) REFERENCES question(quiz, id);

CREATE TABLE participant_answer (
       participant integer not null references participant(id),
       possible_answer integer not null references possible_answer(id),
       created timestamptz not null
);
