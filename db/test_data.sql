-- some dummy data for dev/testing

insert into agent values (default, 'Foo', 'Bar', 'foo@bar.com', 'foobar', crypt('foo', gen_salt('md5')), null, now(), true, now(), now(), null);

