CREATE TABLE participant (
       id serial primary key,
       username text not null,
       password text not null,
       email text not null,
       first_name text not null,
       last_name text not null,
       date_of_birth date not null,
       location text not null,
       last_login timestamptz not null,
       created timestamptz not null,
       modified timestamptz not null
);

CREATE TABLE agent (
       id serial primary key,
       first_name text not null,
       last_name text not null,
       email text not null,
       username text not null,
       password_hash text not null,
       login_failures integer,
       last_login timestamptz not null,
       active boolean not null,
       created timestamptz not null,
       modified timestamptz not null,
       modified_by integer references agent(id)
);

CREATE UNIQUE INDEX agent_username_idx ON agent(username);

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
       created timestamptz not null,
       modified timestamptz not null,
       modified_by integer not null references agent(id)
);

CREATE TABLE quiz (
       id serial primary key,
       name text not null,
       start_date date not null,
       end_date date not null,
       modified timestamptz not null,
       modified_by integer not null references agent(id)
);

CREATE TABLE question (
       id serial primary key,
       quiz integer not null references quiz(id),
       sort integer not null,
       business integer not null references business(id),
       body text not null,
       active boolean not null,
       created timestamptz not null,
       modified timestamptz not null,
       modified_by integer not null references agent(id)
);

CREATE TABLE possible_answer (
       id serial primary key,
       question integer not null references question(id),
       body text not null,
       correct boolean not null,
       active boolean not null,
       modified timestamp not null,
       modified_by integer not null references agent(id)
);

CREATE TABLE participant_answer (
       participant integer not null references participant(id),
       possible_answer integer not null references possible_answer(id),
       created timestamptz not null
);
