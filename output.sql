--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.2
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: abilityscoremodifier; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE abilityscoremodifier (
    score integer NOT NULL,
    modifier integer NOT NULL
);


ALTER TABLE abilityscoremodifier OWNER TO mtfkybajvycpzz;

--
-- Name: abilityscoremodifier_score_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE abilityscoremodifier_score_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE abilityscoremodifier_score_seq OWNER TO mtfkybajvycpzz;

--
-- Name: abilityscoremodifier_score_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE abilityscoremodifier_score_seq OWNED BY abilityscoremodifier.score;


--
-- Name: abilityscores; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE abilityscores (
    id integer NOT NULL,
    character_id integer NOT NULL,
    type character varying(3) NOT NULL,
    score integer NOT NULL
);


ALTER TABLE abilityscores OWNER TO mtfkybajvycpzz;

--
-- Name: abilityscores_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE abilityscores_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE abilityscores_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: abilityscores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE abilityscores_id_seq OWNED BY abilityscores.id;


--
-- Name: character; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE "character" (
    id integer NOT NULL,
    player_id integer NOT NULL,
    charactername character varying(250) NOT NULL,
    race_id integer NOT NULL,
    class_id integer NOT NULL,
    level integer NOT NULL,
    experience integer NOT NULL,
    maxhp integer NOT NULL,
    currenthitdice integer NOT NULL,
    currenthp integer NOT NULL,
    ac integer NOT NULL,
    CONSTRAINT character_ac_check CHECK ((ac >= 0)),
    CONSTRAINT character_currenthitdice_check CHECK ((currenthitdice >= 0)),
    CONSTRAINT character_currenthp_check CHECK ((currenthp >= 0)),
    CONSTRAINT character_experience_check CHECK ((experience > 0)),
    CONSTRAINT character_level_check CHECK ((level > 0)),
    CONSTRAINT character_maxhp_check CHECK ((maxhp > 0))
);


ALTER TABLE "character" OWNER TO mtfkybajvycpzz;

--
-- Name: character_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE character_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE character_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: character_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE character_id_seq OWNED BY "character".id;


--
-- Name: characterproficiency; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE characterproficiency (
    id integer NOT NULL,
    character_id integer NOT NULL,
    skill character varying(25) NOT NULL
);


ALTER TABLE characterproficiency OWNER TO mtfkybajvycpzz;

--
-- Name: characterproficiency_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE characterproficiency_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE characterproficiency_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: characterproficiency_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE characterproficiency_id_seq OWNED BY characterproficiency.id;


--
-- Name: class; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE class (
    id integer NOT NULL,
    classname character varying(15) NOT NULL,
    hitdicetype character varying(10) NOT NULL
);


ALTER TABLE class OWNER TO mtfkybajvycpzz;

--
-- Name: class_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE class_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE class_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: class_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE class_id_seq OWNED BY class.id;


--
-- Name: classequipmentprof; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE classequipmentprof (
    id integer NOT NULL,
    class_id integer NOT NULL,
    equipment character varying(100) NOT NULL
);


ALTER TABLE classequipmentprof OWNER TO mtfkybajvycpzz;

--
-- Name: classequipmentprof_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE classequipmentprof_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE classequipmentprof_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: classequipmentprof_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE classequipmentprof_id_seq OWNED BY classequipmentprof.id;


--
-- Name: classfeature; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE classfeature (
    id integer NOT NULL,
    class_id integer NOT NULL,
    level integer NOT NULL,
    featurename character varying(30) NOT NULL,
    featuretext character varying(4000) NOT NULL,
    CONSTRAINT classfeature_level_check CHECK ((level > 0))
);


ALTER TABLE classfeature OWNER TO mtfkybajvycpzz;

--
-- Name: classfeature_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE classfeature_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE classfeature_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: classfeature_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE classfeature_id_seq OWNED BY classfeature.id;


--
-- Name: classsaveprof; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE classsaveprof (
    id integer NOT NULL,
    class_id integer NOT NULL,
    save character varying(20) NOT NULL
);


ALTER TABLE classsaveprof OWNER TO mtfkybajvycpzz;

--
-- Name: classsaveprof_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE classsaveprof_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE classsaveprof_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: classsaveprof_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE classsaveprof_id_seq OWNED BY classsaveprof.id;


--
-- Name: classskillprof; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE classskillprof (
    id integer NOT NULL,
    class_id integer NOT NULL,
    skill character varying(30) NOT NULL
);


ALTER TABLE classskillprof OWNER TO mtfkybajvycpzz;

--
-- Name: classskillprof_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE classskillprof_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE classskillprof_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: classskillprof_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE classskillprof_id_seq OWNED BY classskillprof.id;


--
-- Name: player; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE player (
    id integer NOT NULL,
    firstname character varying(250) NOT NULL,
    lastname character varying(250) NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(250) NOT NULL
);


ALTER TABLE player OWNER TO mtfkybajvycpzz;

--
-- Name: player_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE player_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE player_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: player_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE player_id_seq OWNED BY player.id;


--
-- Name: profbonus; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE profbonus (
    level integer NOT NULL,
    bonus integer NOT NULL
);


ALTER TABLE profbonus OWNER TO mtfkybajvycpzz;

--
-- Name: profbonus_level_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE profbonus_level_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE profbonus_level_seq OWNER TO mtfkybajvycpzz;

--
-- Name: profbonus_level_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE profbonus_level_seq OWNED BY profbonus.level;


--
-- Name: race; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE race (
    id integer NOT NULL,
    racename character varying(20) NOT NULL,
    agetext character varying(500) NOT NULL,
    alignmenttext character varying(500) NOT NULL,
    sizetext character varying(500) NOT NULL,
    speedtext character varying(500) NOT NULL,
    languagestext character varying(500) NOT NULL,
    hasdarkvison boolean NOT NULL
);


ALTER TABLE race OWNER TO mtfkybajvycpzz;

--
-- Name: race_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE race_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE race_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: race_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE race_id_seq OWNED BY race.id;


--
-- Name: raceabilityscoreincrease; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE raceabilityscoreincrease (
    id integer NOT NULL,
    race_id integer NOT NULL,
    abilityscore character varying(3) NOT NULL,
    increase integer NOT NULL
);


ALTER TABLE raceabilityscoreincrease OWNER TO mtfkybajvycpzz;

--
-- Name: raceabilityscoreincrease_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE raceabilityscoreincrease_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE raceabilityscoreincrease_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: raceabilityscoreincrease_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE raceabilityscoreincrease_id_seq OWNED BY raceabilityscoreincrease.id;


--
-- Name: racefeature; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE racefeature (
    id integer NOT NULL,
    race_id integer NOT NULL,
    featurename character varying(30) NOT NULL,
    featuredescription character varying(1000) NOT NULL
);


ALTER TABLE racefeature OWNER TO mtfkybajvycpzz;

--
-- Name: racefeature_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE racefeature_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE racefeature_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: racefeature_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE racefeature_id_seq OWNED BY racefeature.id;


--
-- Name: skill; Type: TABLE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE TABLE skill (
    id integer NOT NULL,
    skill character varying(25) NOT NULL,
    abilityscore character varying(3) NOT NULL
);


ALTER TABLE skill OWNER TO mtfkybajvycpzz;

--
-- Name: skill_id_seq; Type: SEQUENCE; Schema: public; Owner: mtfkybajvycpzz
--

CREATE SEQUENCE skill_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE skill_id_seq OWNER TO mtfkybajvycpzz;

--
-- Name: skill_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: mtfkybajvycpzz
--

ALTER SEQUENCE skill_id_seq OWNED BY skill.id;


--
-- Name: abilityscoremodifier score; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY abilityscoremodifier ALTER COLUMN score SET DEFAULT nextval('abilityscoremodifier_score_seq'::regclass);


--
-- Name: abilityscores id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY abilityscores ALTER COLUMN id SET DEFAULT nextval('abilityscores_id_seq'::regclass);


--
-- Name: character id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY "character" ALTER COLUMN id SET DEFAULT nextval('character_id_seq'::regclass);


--
-- Name: characterproficiency id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY characterproficiency ALTER COLUMN id SET DEFAULT nextval('characterproficiency_id_seq'::regclass);


--
-- Name: class id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY class ALTER COLUMN id SET DEFAULT nextval('class_id_seq'::regclass);


--
-- Name: classequipmentprof id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classequipmentprof ALTER COLUMN id SET DEFAULT nextval('classequipmentprof_id_seq'::regclass);


--
-- Name: classfeature id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classfeature ALTER COLUMN id SET DEFAULT nextval('classfeature_id_seq'::regclass);


--
-- Name: classsaveprof id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classsaveprof ALTER COLUMN id SET DEFAULT nextval('classsaveprof_id_seq'::regclass);


--
-- Name: classskillprof id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classskillprof ALTER COLUMN id SET DEFAULT nextval('classskillprof_id_seq'::regclass);


--
-- Name: player id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY player ALTER COLUMN id SET DEFAULT nextval('player_id_seq'::regclass);


--
-- Name: profbonus level; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY profbonus ALTER COLUMN level SET DEFAULT nextval('profbonus_level_seq'::regclass);


--
-- Name: race id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY race ALTER COLUMN id SET DEFAULT nextval('race_id_seq'::regclass);


--
-- Name: raceabilityscoreincrease id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY raceabilityscoreincrease ALTER COLUMN id SET DEFAULT nextval('raceabilityscoreincrease_id_seq'::regclass);


--
-- Name: racefeature id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY racefeature ALTER COLUMN id SET DEFAULT nextval('racefeature_id_seq'::regclass);


--
-- Name: skill id; Type: DEFAULT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY skill ALTER COLUMN id SET DEFAULT nextval('skill_id_seq'::regclass);


--
-- Data for Name: abilityscoremodifier; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY abilityscoremodifier (score, modifier) FROM stdin;
1	-5
2	-4
3	-4
4	-3
5	-3
6	-2
7	-2
8	-1
9	-1
10	0
11	0
12	1
13	1
14	2
15	2
16	3
17	3
18	4
19	4
20	5
21	5
22	6
23	6
24	7
25	7
26	8
27	8
28	9
29	9
30	10
31	10
32	11
33	11
34	12
35	12
\.


--
-- Name: abilityscoremodifier_score_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('abilityscoremodifier_score_seq', 35, true);


--
-- Data for Name: abilityscores; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY abilityscores (id, character_id, type, score) FROM stdin;
1	1	STR	16
2	1	DEX	17
3	1	CON	19
4	1	INT	6
5	1	WIS	8
6	1	CHA	11
\.


--
-- Name: abilityscores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('abilityscores_id_seq', 6, true);


--
-- Data for Name: character; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY "character" (id, player_id, charactername, race_id, class_id, level, experience, maxhp, currenthitdice, currenthp, ac) FROM stdin;
1	1	conner	1	1	1	1	62	1	1	15
\.


--
-- Name: character_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('character_id_seq', 1, true);


--
-- Data for Name: characterproficiency; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY characterproficiency (id, character_id, skill) FROM stdin;
1	1	Animal Handling
2	1	Nature
\.


--
-- Name: characterproficiency_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('characterproficiency_id_seq', 2, true);


--
-- Data for Name: class; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY class (id, classname, hitdicetype) FROM stdin;
1	Barbarian	d12
2	Bard	d8
3	Cleric	d8
4	Druid	d8
5	Fighter	d10
6	Monk	d8
7	Paladin	d10
8	Ranger	d10
9	Rogue	d8
10	Sorcerer	d6
11	Warlock	d8
12	Wizard	d6
\.


--
-- Name: class_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('class_id_seq', 12, true);


--
-- Data for Name: classequipmentprof; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY classequipmentprof (id, class_id, equipment) FROM stdin;
1	1	Light Armor
2	1	Medium Armor
3	1	Shields
4	1	Simple Weapons
5	1	Martial Weapons
6	2	Light Armor
7	2	Simple Weapons
8	2	Hand crossbows
9	2	Longswords
10	2	Rapiers
11	2	Shortswords
12	2	Three musical instruments of your choice
13	3	Light Armor
14	3	Medium Armor
15	3	Shields
16	3	Simple Weapons
17	4	Light Armor 
18	4	Medium Armor
19	4	Shields
20	4	Clubs
21	4	Daggers
22	4	Darts
23	4	Javelins
24	4	Maces
25	4	Quarterstaffs
26	4	Scimitars
27	4	Sickles
28	4	Slings
29	4	Spears
30	4	Herbalism kit
31	5	All Armor
32	5	Shields
33	5	Simple Weapons
34	5	Martial Weapons
35	6	Simple Weapons
36	6	Shortswords
37	6	Choose one type of artisan’s tools or one musical instrument
38	7	All Armor
39	7	Shields
40	7	Simple Weapons
41	7	Martial Weapons
42	8	Light Armor
43	8	Medium Armor
44	8	Shields
45	8	Simple Seapons
46	8	Martial weapons
47	9	Light Armor
48	9	Simple Weapons
49	9	Hand Crossbow
50	9	Longswords
51	9	Rapiers
52	9	Shortswords
53	9	Thieves’ tools
54	10	Daggers
55	10	Darts
56	10	Slings
57	10	Quarterstaffs
58	10	Light crossbows
59	11	Light Weapons
60	11	Simple Weapons
61	12	Daggers
62	12	Darts
63	12	Slings
64	12	Quarterstaffs
65	12	Light crossbows
\.


--
-- Name: classequipmentprof_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('classequipmentprof_id_seq', 65, true);


--
-- Data for Name: classfeature; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY classfeature (id, class_id, level, featurename, featuretext) FROM stdin;
1	1	1	Rage	In battle, you fight with primal ferocity. On your turn, you can enter a rage as a bonus action.\n    <br>\n    <br>\n    While raging, you gain the following benefits if you aren’t wearing heavy armor:\n    <br>\n    <br>\n    You have advantage on Strength checks and Strength saving throws.\n    When you make a melee weapon attack using Strength, you gain a bonus to the damage roll that increases as you gain levels as a barbarian, as shown in the Rage Damage column of the Barbarian table.\n    You have resistance to bludgeoning, piercing, and slashing damage.\n    If you are able to cast spells, you can’t cast them or concentrate on them while raging.\n    <br>\n    <br>\n    Your rage lasts for 1 minute. It ends early if you are knocked unconscious or if your turn ends and you haven’t attacked a hostile creature since your last turn or taken damage since then. You can also end your rage on your turn as a bonus action.\n    <br>\n    <br>\n    Once you have raged the number of times shown for your barbarian level in the Rages column of the Barbarian table, you must finish a long rest before you can rage again.
2	1	1	Unarmored Defense	While you are not wearing any armor, your Armor Class equals 10 + your Dexterity modifier + your Constitution modifier. You can use a shield and still gain this benefit.
3	1	2	Reckless Attack	Starting at 2nd level, you can throw aside all concern for defense to attack with fierce desperation. When you make your first attack on your turn, you can decide to attack recklessly. Doing so gives you advantage on melee weapon attack rolls using Strength during this turn, but attack rolls against you have advantage until your next turn.
4	1	2	Danger Sense	At 2nd level, you gain an uncanny sense of when things nearby aren’t as they should be, giving you an edge when you dodge away from danger.\n    <br>\n    <br>\n    You have advantage on Dexterity saving throws against effects that you can see, such as traps and spells. To gain this benefit, you can’t be blinded, deafened, or incapacitated.
5	1	3	Primal Path	At 3rd level, you choose a path that shapes the nature of your rage. The Path of the Berserker is detailed at the end of the class description, and additional primal paths are available in other sources. Your choice grants you features at 3rd level and again at 6th, 10th, and 14th levels.
6	1	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
7	1	5	Extra Attack	Beginning at 5th level, you can attack twice, instead of once, whenever you take the Attack action on your turn.
8	1	5	Fast Movement	Starting at 5th level, your speed increases by 10 feet while you aren’t wearing heavy armor.
9	1	7	Feral Instinct	By 7th level, your instincts are so honed that you have advantage on initiative rolls.\n    <br>\n    <br>\n    Additionally, if you are surprised at the beginning of combat and aren’t incapacitated, you can act normally on your first turn, but only if you enter your rage before doing anything else on that turn.
10	1	9	Brutal Critical	Beginning at 9th level, you can roll one additional weapon damage die when determining the extra damage for a critical hit with a melee attack.\n    <br>\n    <br>\n    This increases to two additional dice at 13th level and three additional dice at 17th level.
11	1	11	Relentless Rage	Starting at 11th level, your rage can keep you fighting despite grievous wounds. If you drop to 0 hit points while you’re raging and don’t die outright, you can make a DC 10 Constitution saving throw. If you succeed, you drop to 1 hit point instead.\n    <br>\n    <br>\n    Each time you use this feature after the first, the DC increases by 5. When you finish a short or long rest, the DC resets to 10.
12	1	15	Persistent Rage	Beginning at 15th level, your rage is so fierce that it ends early only if you fall unconscious or if you choose to end it.
13	1	18	Indomitable Might	Beginning at 18th level, if your total for a Strength check is less than your Strength score, you can use that score in place of the total.
14	1	20	Primal Champion	At 20th level, you embody the power of the wilds. Your Strength and Constitution scores increase by 4. Your maximum for those scores is now 24.
15	2	1	Bardic Inspiration	You can inspire others through stirring words or music. To do so, you use a bonus action on your turn to choose one creature other than yourself within 60 feet of you who can hear you. That creature gains one Bardic Inspiration die, a d6.\n    <br>\n    <br>\n    Once within the next 10 minutes, the creature can roll the die and add the number rolled to one ability check, attack roll, or saving throw it makes. The creature can wait until after it rolls the d20 before deciding to use the Bardic Inspiration die, but must decide before the DM says whether the roll succeeds or fails. Once the Bardic Inspiration die is rolled, it is lost. A creature can have only one Bardic Inspiration die at a time.\n    <br>\n    <br>\n    You can use this feature a number of times equal to your Charisma modifier (a minimum of once). You regain any expended uses when you finish a long rest.\n    <br>\n    <br>\n    Your Bardic Inspiration die changes when you reach certain levels in this class. The die becomes a d8 at 5th level, a d10 at 10th level, and a d12 at 15th level.
16	2	2	Jack of All Trades	Starting at 2nd level, you can add half your proficiency bonus, rounded down, to any ability check you make that doesn’t already include your proficiency bonus.
17	2	2	Song of Rest	Beginning at 2nd level, you can use soothing music or oration to help revitalize your wounded allies during a short rest. If you or any friendly creatures who can hear your performance regain hit points at the end of the short rest by spending one or more Hit Dice, each of those creatures regains an extra 1d6 hit points.\n    <br>\n    <br>\n    The extra hit points increase when you reach certain levels in this class: to 1d8 at 9th level, to 1d10 at 13th level, and to 1d12 at 17th level.
18	2	3	Bard College	At 3rd level, you delve into the advanced techniques of a bard college of your choice: the College of Lore detailed at the end of the class description or another from the Players Handbook or other sources. Your choice grants you features at 3rd level and again at 6th and 14th level.
19	2	3	Expertise	At 3rd level, choose two of your skill proficiencies. Your proficiency bonus is doubled for any ability check you make that uses either of the chosen proficiencies.\n    <br>\n    <br>\n    At 10th level, you can choose another two skill proficiencies to gain this benefit.
20	2	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
21	2	5	Font of Inspiration	Beginning when you reach 5th level, you regain all of your expended uses of Bardic Inspiration when you finish a short or long rest.
22	2	6	Countercharm	At 6th level, you gain the ability to use musical notes or words of power to disrupt mind-influencing effects. As an action, you can start a performance that lasts until the end of your next turn. During that time, you and any friendly creatures within 30 feet of you have advantage on saving throws against being frightened or charmed. A creature must be able to hear you to gain this benefit. The performance ends early if you are incapacitated or silenced or if you voluntarily end it (no action required).
23	2	10	Magical Secrets	By 10th level, you have plundered magical knowledge from a wide spectrum of disciplines. Choose two spells from any class, including this one. A spell you choose must be of a level you can cast, as shown on the Bard table, or a cantrip.\n    <br>\n    <br>\n    The chosen spells count as bard spells for you and are included in the number in the Spells Known column of the Bard table.\n    <br>\n    <br>\n    You learn two additional spells from any class at 14th level and again at 18th level.
24	2	20	Superior Inspiration	At 20th level, when you roll initiative and have no uses of Bardic Inspiration left, you regain one use.
25	3	1	Divine Domain	Choose one domain related to your deity: Knowledge, Life, Light, Nature, Tempest, Trickery, or War. The Life domain is detailed at the end of the class description and provides examples of gods associated with it. See the Player’s Handbook for details on all the domains.Your choice grants you domain spells and other features when you choose it at 1st level. It also grants you additional ways to use Channel Divinity when you gain that feature at 2nd level, and additional benefits at 6th, 8th, and 17th levels.\n    <br>\n    <br>\n    Domain Spells\n    Each domain has a list of spells — its domain spells — that you gain at the cleric levels noted in the domain description. Once you gain a domain spell, you always have it prepared, and it doesn’t count against the number of spells you can prepare each day.\n    <br>\n    <br>\n    If you have a domain spell that doesn’t appear on the cleric spell list, the spell is nonetheless a cleric spell for you.
26	3	2	Channel Divinity	At 2nd level, you gain the ability to channel divine energy directly from your deity, using that energy to fuel magical effects. You start with two such effects: Turn Undead and an effect determined by your domain. Some domains grant you additional effects as you advance in levels, as noted in the domain description.\n    <br>\n    <br>\n    When you use your Channel Divinity, you choose which effect to create. You must then finish a short or long rest to use your Channel Divinity again.\n    <br>\n    <br>\n    Some Channel Divinity effects require saving throws. When you use such an effect from this class, the DC equals your cleric spell save DC.\n    <br>\n    <br>\n    Beginning at 6th level, you can use your Channel Divinity twice between rests, and beginning at 18th level, you can use it three times between rests. When you finish a short or long rest, you regain your expended uses.\n    <br>\n    <br>\n    Channel Divinity: Turn Undead\n    As an action, you present your holy symbol and speak a prayer censuring the undead. Each undead that can see or hear you within 30 feet of you must make a Wisdom saving throw. If the creature fails its saving throw, it is turned for 1 minute or until it takes any damage.\n    <br>\n    <br>\n    A turned creature must spend its turns trying to move as far away from you as it can, and it can’t willingly move to a space within 30 feet of you. It also can’t take reactions. For its action, it can use only the Dash action or try to escape from an effect that prevents it from moving. If there’s nowhere to move, the creature can use the Dodge action.
27	3	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
28	3	5	Destroy Undead	Starting at 5th level, when an undead fails its saving throw against your Turn Undead feature, the creature is instantly destroyed if its challenge rating is at or below a certain threshold, as shown in the Destroy Undead table.\n    <br>\n    <br>\n    Destroy Undead Table\n    <br>\n    <br>\n    Cleric Level - Destroys Undead of CR ...\n    <br>\n    5th - 1/2 or lower\n    <br>\n    8th - 1 or lower\n    <br>\n    11th - 2 or lower\n    <br>\n    14th - 3 or lower\n    <br>\n    17th - 4 or lower
29	3	10	Divine Intervention	Beginning at 10th level, you can call on your deity to intervene on your behalf when your need is great.\n    <br>\n    <br>\n    Imploring your deity’s aid requires you to use your action. Describe the assistance you seek, and roll percentile dice. If you roll a number equal to or lower than your cleric level, your deity intervenes. The DM chooses the nature of the intervention; the effect of any cleric spell or cleric domain spell would be appropriate.\n    <br>\n    <br>\n    If your deity intervenes, you can’t use this feature again for 7 days. Otherwise, you can use it again after you finish a long rest.\n    <br>\n    <br>\n    At 20th level, your call for intervention succeeds automatically, no roll required.
30	4	2	Wild Shape	Starting at 2nd level, you can use your action to magically assume the shape of a beast that you have seen before. You can use this feature twice. You regain expended uses when you finish a short or long rest.\n    <br>\n    <br>\n    Your druid level determines the beasts you can transform into, as shown in the Beast Shapes table. At 2nd level, for example, you can transform into any beast that has a challenge rating of 1/4 or lower that doesn’t have a flying or swimming speed.\n    <br>\n    <br>\n    Beast Shapes\n    <br>\n    Level - Max CR - Limitations                 - Example\n    <br>\n    2nd   - 1/4    - No flying or swimming speed - Wolf\n    <br>\n    4th   - 1/2    - No flying speed             - Crocodile\n    <br>\n    8th   -   1                                  - Giant eagle\n    <br>\n    You can stay in a beast shape for a number of hours equal to half your druid level (rounded down). You then revert to your normal form unless you expend another use of this feature. You can revert to your normal form earlier by using a bonus action on your turn. You automatically revert if you fall unconscious, drop to 0 hit points, or die.\n    <br>\n    <br>\n    While you are transformed, the following rules apply:\n    <br>\n    <br>\n    - Your game statistics are replaced by the statistics of the beast, but you retain your alignment, personality, and Intelligence, Wisdom, and Charisma scores. You also retain all of your skill and saving throw proficiencies, in addition to gaining those of the creature. If the creature has the same proficiency as you and the bonus in its stat block is higher than yours, use the creature’s bonus instead of yours. If the creature has any legendary or lair actions, you can’t use them.\n    <br>\n    - When you transform, you assume the beast’s hit points and Hit Dice. When you revert to your normal form, you return to the number of hit points you had before you transformed. However, if you revert as a result of dropping to 0 hit points, any excess damage carries over to your normal form. For example, if you take 10 damage in animal form and have only 1 hit point left, you revert and take 9 damage. As long as the excess damage doesn’t reduce your normal form to 0 hit points, you aren’t knocked unconscious.\n    <br>\n    You can’t cast spells, and your ability to speak or take any action that requires hands is limited to the capabilities of your beast form. Transforming doesn’t break your concentration on a spell you’ve already cast, however, or prevent you from taking actions that are part of a spell, such as call lightning, that you’ve already cast.\n    <br>\n    - You retain the benefit of any features from your class, race, or other source and can use them if the new form is physically capable of doing so. However, you can’t use any of your special senses, such as darkvision, unless your new form also has that sense.\n    <br>\n    - You choose whether your equipment falls to the ground in your space, merges into your new form, or is worn by it. Worn equipment functions as normal, but the DM decides whether it is practical for the new form to wear a piece of equipment, based on the creature’s shape and size. Your equipment doesn’t change size or shape to match the new form, and any equipment that the new form can’t wear must either fall to the ground or merge with it. Equipment that merges with the form has no effect until you leave the form.
31	4	2	Druid Circle	At 2nd level, you choose to identify with a circle of druids: the Circle of the Land detailed at the end of the class description or one from the Players Handbook or other sources. Your choice grants you features at 2nd level and again at 6th, 10th, and 14th level.
32	4	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
33	4	18	Timeless Body	Starting at 18th level, the primal magic that you wield causes you to age more slowly. For every 10 years that pass, your body ages only 1 year.
34	4	18	Beast Spells	Beginning at 18th level, you can cast many of your druid spells in any shape you assume using Wild Shape. You can perform the somatic and verbal components of a druid spell while in a beast shape, but you aren’t able to provide material components.
35	4	20	Archdruid	At 20th level, you can use your Wild Shape an unlimited number of times.\n    <br>\n    <br>\n    Additionally, you can ignore the verbal and somatic components of your druid spells, as well as any material components that lack a cost and aren’t consumed by a spell. You gain this benefit in both your normal shape and your beast shape from Wild Shape.
36	5	1	Fighting Style	You adopt a particular style of fighting as your specialty. Choose one of the following options. You can’t take a Fighting Style option more than once, even if you later get to choose again.\n    <br>\n    <br>\n    Archery - You gain a +2 bonus to attack rolls you make with ranged weapons.\n    <br>\n    <br>\n    Defense - While you are wearing armor, you gain a +1 bonus to AC.\n    <br>\n    <br>\n    Dueling - When you are wielding a melee weapon in one hand and no other weapons, you gain a +2 bonus to damage rolls with that weapon.\n    <br>\n    <br>\n    Great Weapon Fighting - When you roll a 1 or 2 on a damage die for an attack you make with a melee weapon that you are wielding with two hands, you can reroll the die and must use the new roll, even if the new roll is a 1 or a 2. The weapon must have the two-handed or versatile property for you to gain this benefit.\n    <br>\n    <br>\n    Protection - When a creature you can see attacks a target other than you that is within 5 feet of you, you can use your reaction to impose disadvantage on the attack roll. You must be wielding a shield.\n    <br>\n    <br>\n    Two-Weapon Fighting - When you engage in two-weapon fighting, you can add your ability modifier to the damage of the second attack.
37	5	1	Second Wind	You have a limited well of stamina that you can draw on to protect yourself from harm. On your turn, you can use a bonus action to regain hit points equal to 1d10 + your fighter level. Once you use this feature, you must finish a short or long rest before you can use it again.
38	5	2	Action Surge	Starting at 2nd level, you can push yourself beyond your normal limits for a moment. On your turn, you can take one additional action on top of your regular action and a possible bonus action.\n    <br>\n    <br>\n    Once you use this feature, you must finish a short or long rest before you can use it again. Starting at 17th level, you can use it twice before a rest, but only once on the same turn.
39	5	3	Martial Archetype	At 3rd level, you choose an archetype that you strive to emulate in your combat styles and techniques. Choose Champion, Battle Master, or Eldritch Knight, all detailed at the end of the class description. The archetype you choose grants you features at 3rd level and again at 7th, 10th, 15th, and 18th level.
40	5	4	Ability Score Improvement	When you reach 4th level, and again at 6th, 8th, 12th, 14th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
41	5	5	Extra Attack	Beginning at 5th level, you can attack twice, instead of once, whenever you take the Attack action on your turn.\n    <br>\n    <br>\n    The number of attacks increases to three when you reach 11th level in this class and to four when you reach 20th level in this class.
42	5	9	Indomitable	Beginning at 9th level, you can reroll a saving throw that you fail. If you do so, you must use the new roll, and you can’t use this feature again until you finish a long rest.\n    <br>\n    <br>\n    You can use this feature twice between long rests starting at 13th level and three times between long rests starting at 17th level.
43	6	1	Martial Arts	At 1st level, your practice of martial arts gives you mastery of combat styles that use unarmed strikes and monk weapons, which are shortswords and any simple melee weapons that don’t have the two-handed or heavy property.\n    <br>\n    <br>\n    You gain the following benefits while you are unarmed or wielding only monk weapons and you aren’t wearing armor or wielding a shield:\n    <br>\n    - You can use Dexterity instead of Strength for the attack and damage rolls of your unarmed strikes and monk weapons.\n    <br>\n    - You can roll a d4 in place of the normal damage of your unarmed strike or monk weapon. This die changes as you gain monk levels, as shown in the Martial Arts column of the Monk table.\n    <br>\n    - When you use the Attack action with an unarmed strike or a monk weapon on your turn, you can make one unarmed strike as a bonus action. For example, if you take the Attack action and attack with a quarterstaff, you can also make an unarmed strike as a bonus action, assuming you haven’t already taken a bonus action this turn.\n    <br>\n    - Certain monasteries use specialized forms of the monk weapons. For example, you might use a club that is two lengths of wood connected by a short chain (called a nunchaku) or a sickle with a shorter, straighter blade (called a kama). Whatever name you use for a monk weapon, you can use the game statistics provided for the weapon in the Weapons section.
44	6	2	Ki	Starting at 2nd level, your training allows you to harness the mystic energy of ki. Your access to this energy is represented by a number of ki points. Your monk level determines the number of points you have, as shown in the Ki Points column of the Monk table.\n    <br>\n    <br>\n    You can spend these points to fuel various ki features. You start knowing three such features: Flurry of Blows, Patient Defense, and Step of the Wind. You learn more ki features as you gain levels in this class.\n    <br>\n    <br>\n    When you spend a ki point, it is unavailable until you finish a short or long rest, at the end of which you draw all of your expended ki back into yourself. You must spend at least 30 minutes of the rest meditating to regain your ki points.\n    <br>\n    <br>\n    Some of your ki features require your target to make a saving throw to resist the feature’s effects. The saving throw DC is calculated as follows:\n    <br>\n    <br>\n    Ki save DC = 8 + your proficiency bonus + your Wisdom modifier\n    <br>\n    <br>\n    Flurry of Blows - Immediately after you take the Attack action on your turn, you can spend 1 ki point to make two unarmed strikes as a bonus action.\n    <br>\n    <br>\n    Patient Defense - You can spend 1 ki point to take the Dodge action as a bonus action on your turn.\n    <br>\n    <br>\n    Step of the Wind - You can spend 1 ki point to take the Disengage or Dash action as a bonus action on your turn, and your jump distance is doubled for the turn.
45	6	2	Unarmored Movement	Starting at 2nd level, your speed increases by 10 feet while you are not wearing armor or wielding a shield. This bonus increases when you reach certain monk levels, as shown in the Monk table.\n    <br>\n    <br>\n    At 9th level, you gain the ability to move along vertical surfaces and across liquids on your turn without falling during the move.
46	6	3	Monastic Tradition	When you reach 3rd level, you commit yourself to a monastic tradition: the Way of the Open Hand, detailed at the end of the class description or one from another source. Your tradition grants you features at 3rd level and again at 6th, 11th, and 17th level.
47	6	3	Deflect Missiles	Starting at 3rd level, you can use your reaction to deflect or catch the missile when you are hit by a ranged weapon attack. When you do so, the damage you take from the attack is reduced by 1d10 + your Dexterity modifier + your monk level.\n    <br>\n    <br>\n    If you reduce the damage to 0, you can catch the missile if it is small enough for you to hold in one hand and you have at least one hand free. If you catch a missile in this way, you can spend 1 ki point to make a ranged attack with the weapon or piece of ammunition you just caught, as part of the same reaction. You make this attack with proficiency, regardless of your weapon proficiencies, and the missile counts as a monk weapon for the attack, which has a normal range of 20 feet and a long range of 60 feet.
48	6	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
49	6	4	Slow Fall	Beginning at 4th level, you can use your reaction when you fall to reduce any falling damage you take by an amount equal to five times your monk level.
50	6	5	Extra Attack	Beginning at 5th level, you can attack twice, instead of once, whenever you take the Attack action on your turn.
51	6	5	Stunning Strike	Starting at 5th level, you can interfere with the flow of ki in an opponent’s body. When you hit another creature with a melee weapon attack, you can spend 1 ki point to attempt a stunning strike. The target must succeed on a Constitution saving throw or be stunned until the end of your next turn.
52	6	6	Ki-Empowered Strikes	Starting at 6th level, your unarmed strikes count as magical for the purpose of overcoming resistance and immunity to nonmagical attacks and damage.
53	6	7	Evasion	At 7th level, your instinctive agility lets you dodge out of the way of certain area effects, such as a blue dragon’s lightning breath or a fireball spell. When you are subjected to an effect that allows you to make a Dexterity saving throw to take only half damage, you instead take no damage if you succeed on the saving throw, and only half damage if you fail.
54	6	7	Stillness of Mind	Starting at 7th level, you can use your action to end one effect on yourself that is causing you to be charmed or frightened.
55	6	10	Purity of Body	At 10th level, your mastery of the ki flowing through you makes you immune to disease and poison.
56	6	13	Tongue of the Sun and Moon	Starting at 13th level, you learn to touch the ki of other minds so that you understand all spoken languages. Moreover, any creature that can understand a language can understand what you say.
57	6	14	Diamond Soul	Beginning at 14th level, your mastery of ki grants you proficiency in all saving throws.\n    <br>\n    <br>\n    Additionally, whenever you make a saving throw and fail, you can spend 1 ki point to reroll it and take the second result.
58	6	15	Timeless Body	At 15th level, your ki sustains you so that you suffer none of the frailty of old age, and you can’t be aged magically. You can still die of old age, however. In addition, you no longer need food or water.
59	6	18	Empty Body	Beginning at 18th level, you can use your action to spend 4 ki points to become invisible for 1 minute. During that time, you also have resistance to all damage but force damage.\n    <br>\n    <br>\n    Additionally, you can spend 8 ki points to cast the astral projection spell, without needing material components. When you do so, you can’t take any other creatures with you.
60	6	20	Perfect Self	At 20th level, when you roll for initiative and have no ki points remaining, you regain 4 ki points.
61	7	1	Divine Sense	The presence of strong evil registers on your senses like a noxious odor, and powerful good rings like heavenly music in your ears. As an action, you can open your awareness to detect such forces. Until the end of your next turn, you know the location of any celestial, fiend, or undead within 60 feet of you that is not behind total cover. You know the type (celestial, fiend, or undead) of any being whose presence you sense, but not its identity (the vampire Count Strahd von Zarovich, for instance). Within the same radius, you also detect the presence of any place or object that has been consecrated or desecrated, as with the hallow spell.\n    <br>\n    <br>\n    You can use this feature a number of times equal to 1 + your Charisma modifier. When you finish a long rest, you regain all expended uses.
62	7	1	Lay on Hands	Your blessed touch can heal wounds. You have a pool of healing power that replenishes when you take a long rest. With that pool, you can restore a total number of hit points equal to your paladin level × 5.\n    <br>\n    <br>\n    As an action, you can touch a creature and draw power from the pool to restore a number of hit points to that creature, up to the maximum amount remaining in your pool.\n    <br>\n    <br>\n    Alternatively, you can expend 5 hit points from your pool of healing to cure the target of one disease or neutralize one poison affecting it. You can cure multiple diseases and neutralize multiple poisons with a single use of Lay on Hands, expending hit points separately for each one.\n    <br>\n    <br>\n    This feature has no effect on undead and constructs.
63	7	2	Fighting Style	At 2nd level, you adopt a style of fighting as your specialty. Choose one of the following options. You can’t take a Fighting Style option more than once, even if you later get to choose again.\n    <br>\n    <br>\n    Defense - While you are wearing armor, you gain a +1 bonus to AC.\n    <br>\n    <br>\n    Dueling - When you are wielding a melee weapon in one hand and no other weapons, you gain a +2 bonus to damage rolls with that weapon.\n    <br>\n    <br>\n    Great Weapon Fighting - When you roll a 1 or 2 on a damage die for an attack you make with a melee weapon that you are wielding with two hands, you can reroll the die and must use the new roll. The weapon must have the two-handed or versatile property for you to gain this benefit.\n    <br>\n    <br>\n    Protection - When a creature you can see attacks a target other than you that is within 5 feet of you, you can use your reaction to impose disadvantage on the attack roll. You must be wielding a shield.
64	7	2	Divine Smite	Starting at 2nd level, when you hit a creature with a melee weapon attack, you can expend one spell slot to deal radiant damage to the target, in addition to the weapon’s damage. The extra damage is 2d8 for a 1st-level spell slot, plus 1d8 for each spell level higher than 1st, to a maximum of 5d8. The damage increases by 1d8 if the target is an undead or a fiend.
65	7	3	Divine Health	By 3rd level, the divine magic flowing through you makes you immune to disease.
66	7	3	Sacred Oath	When you reach 3rd level, you swear the oath that binds you as a paladin forever. Up to this time you have been in a preparatory stage, committed to the path but not yet sworn to it. Now you choose the Oath of Devotion detailed at the end of the class description or one from another source.\n    <br>\n    <br>\n    Your choice grants you features at 3rd level and again at 7th, 15th, and 20th level. Those features include oath spells and the Channel Divinity feature.
67	7	3	Oath Spells	Each oath has a list of associated spells. You gain access to these spells at the levels specified in the oath description. Once you gain access to an oath spell, you always have it prepared. Oath spells don’t count against the number of spells you can prepare each day.\n    <br>\n    <br>\n    If you gain an oath spell that doesn’t appear on the paladin spell list, the spell is nonetheless a paladin spell for you.
68	7	3	Channel Divinity	Your oath allows you to channel divine energy to fuel magical effects. Each Channel Divinity option provided by your oath explains how to use it.\n    <br>\n    <br>\n    When you use your Channel Divinity, you choose which option to use. You must then finish a short or long rest to use your Channel Divinity again.\n    <br>\n    <br>\n    Some Channel Divinity effects require saving throws. When you use such an effect from this class, the DC equals your paladin spell save DC.
69	7	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
70	7	5	Extra Attack	Beginning at 5th level, you can attack twice, instead of once, whenever you take the Attack action on your turn.
71	7	6	Aura of Protection	Starting at 6th level, whenever you or a friendly creature within 10 feet of you must make a saving throw, the creature gains a bonus to the saving throw equal to your Charisma modifier (with a minimum bonus of +1). You must be conscious to grant this bonus.\n    <br>\n    <br>\n    At 18th level, the range of this aura increases to 30 feet.
72	7	10	Aura of Courage	Starting at 10th level, you and friendly creatures within 10 feet of you can’t be frightened while you are conscious.\n    <br>\n    <br>\n    At 18th level, the range of this aura increases to 30 feet.
73	7	11	Improved Divine Smite	By 11th level, you are so suffused with righteous might that all your melee weapon strikes carry divine power with them. Whenever you hit a creature with a melee weapon, the creature takes an extra 1d8 radiant damage. If you also use your Divine Smite with an attack, you add this damage to the extra damage of your Divine Smite.
74	7	14	Cleansing Touch	Beginning at 14th level, you can use your action to end one spell on yourself or on one willing creature that you touch.\n    <br>\n    <br>\n    You can use this feature a number of times equal to your Charisma modifier (a minimum of once). You regain expended uses when you finish a long rest.
75	8	1	Favored Enemy	Beginning at 1st level, you have significant experience studying, tracking, hunting, and even talking to a certain type of enemy.\n    <br>\n    <br>\n    Choose a type of favored enemy: aberrations, beasts, celestials, constructs, dragons, elementals, fey, fiends, giants, monstrosities, oozes, plants, or undead. Alternatively, you can select two races of humanoid (such as gnolls and orcs) as favored enemies.\n    <br>\n    <br>\n    You have advantage on Wisdom (Survival) checks to track your favored enemies, as well as on Intelligence checks to recall information about them.\n    <br>\n    <br>\n    When you gain this feature, you also learn one language of your choice that is spoken by your favored enemies, if they speak one at all.\n    <br>\n    <br>\n    You choose one additional favored enemy, as well as an associated language, at 6th and 14th level. As you gain levels, your choices should reflect the types of monsters you have encountered on your adventures.
76	8	1	Natural Explorer	You are particularly familiar with one type of natural environment and are adept at traveling and surviving in such regions. Choose one type of favored terrain: arctic, coast, desert, forest, grassland, mountain, swamp, or the Underdark. When you make an Intelligence or Wisdom check related to your favored terrain, your proficiency bonus is doubled if you are using a skill that you’re proficient in.\n    <br>\n    <br>\n    While traveling for an hour or more in your favored terrain, you gain the following benefits:\n    <br>\n    <br>\n    Difficult terrain doesn’t slow your group’s travel.\n    <br>\n    - Your group can’t become lost except by magical means.\n    <br>\n    - Even when you are engaged in another activity while traveling (such as foraging, navigating, or tracking), you remain alert to danger.\n    <br>\n    - If you are traveling alone, you can move stealthily at a normal pace.\n    <br>\n    - When you forage, you find twice as much food as you normally would.\n    <br>\n    - While tracking other creatures, you also learn their exact number, their sizes, and how long ago they passed through the area.\n    <br>\n    You choose additional favored terrain types at 6th and 10th level.
77	8	2	Fighting Style	At 2nd level, you adopt a particular style of fighting as your specialty. Choose one of the following options.\n    <br>\n    You can’t take a Fighting Style option more than once, even if you later get to choose again.\n    <br>\n    <br>\n    Archery - You gain a +2 bonus to attack rolls you make with ranged weapons.\n    <br>\n    <br>\n    Defense - While you are wearing armor, you gain a +1 bonus to AC.\n    <br>\n    <br>\n    Dueling - When you are wielding a melee weapon in one hand and no other weapons, you gain a +2 bonus to damage rolls with that weapon.\n    <br>\n    <br>\n    Two-Weapon Fighting - When you engage in two-weapon fighting, you can add your ability modifier to the damage of the second attack.
78	8	3	Ranger Archetype	At 3rd level, you choose an archetype that you strive to emulate: the Hunter that is detailed at the end of the class description or one from another source. Your choice grants you features at 3rd level and again at 7th, 11th, and 15th level.
79	8	3	Primeval Awareness	Beginning at 3rd level, you can use your action and expend one ranger spell slot to focus your awareness on the region around you. For 1 minute per level of the spell slot you expend, you can sense whether the following types of creatures are present within 1 mile of you (or within up to 6 miles if you are in your favored terrain): aberrations, celestials, dragons, elementals, fey, fiends, and undead. This feature doesn’t reveal the creatures’ location or number.
80	8	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
81	8	5	Extra Attack	Beginning at 5th level, you can attack twice, instead of once, whenever you take the Attack action on your turn.
82	8	8	Land’s Stride	Starting at 8th level, moving through nonmagical difficult terrain costs you no extra movement. You can also pass through nonmagical plants without being slowed by them and without taking damage from them if they have thorns, spines, or a similar hazard.\n\n    In addition, you have advantage on saving throws against plants that are magically created or manipulated to impede movement, such those created by the entangle spell.
83	8	10	Hide in Plain Sight	Starting at 10th level, you can spend 1 minute creating camouflage for yourself. You must have access to fresh mud, dirt, plants, soot, and other naturally occurring materials with which to create your camouflage.\n    <br>\n    <br>\n    Once you are camouflaged in this way, you can try to hide by pressing yourself up against a solid surface, such as a tree or wall, that is at least as tall and wide as you are. You gain a +10 bonus to Dexterity (Stealth) checks as long as you remain there without moving or taking actions. Once you move or take an action or a reaction, you must camouflage yourself again to gain this benefit.
84	8	14	Vanish	Starting at 14th level, you can use the Hide action as a bonus action on your turn. Also, you can’t be tracked by nonmagical means, unless you choose to leave a trail.
85	8	18	Feral Senses	At 18th level, you gain preternatural senses that help you fight creatures you can’t see. When you attack a creature you can’t see, your inability to see it doesn’t impose disadvantage on your attack rolls against it.\n    <br>\n    <br>\n    You are also aware of the location of any invisible creature within 30 feet of you, provided that the creature isn’t hidden from you and you aren’t blinded or deafened.
86	8	20	Foe Slayer	At 20th level, you become an unparalleled hunter of your enemies. Once on each of your turns, you can add your Wisdom modifier to the attack roll or the damage roll of an attack you make against one of your favored enemies. You can choose to use this feature before or after the roll, but before any effects of the roll are applied.
87	9	1	Expertise	At 1st level, choose two of your skill proficiencies, or one of your skill proficiencies and your proficiency with thieves’ tools. Your proficiency bonus is doubled for any ability check you make that uses either of the chosen proficiencies.\n    <br>\n    <br>\n    At 6th level, you can choose two more of your proficiencies (in skills or with thieves’ tools) to gain this benefit.
88	9	1	Sneak Attack	Beginning at 1st level, you know how to strike subtly and exploit a foe’s distraction. Once per turn, you can deal an extra 1d6 damage to one creature you hit with an attack if you have advantage on the attack roll. The attack must use a finesse or a ranged weapon.\n    <br>\n    <br>\n    You don’t need advantage on the attack roll if another enemy of the target is within 5 feet of it, that enemy isn’t incapacitated, and you don’t have disadvantage on the attack roll.\n    <br>\n    <br>\n    The amount of the extra damage increases as you gain levels in this class, as shown in the Sneak Attack column of the Rogue table.
89	9	1	Thieves’ Cant	During your rogue training you learned thieves’ cant, a secret mix of dialect, jargon, and code that allows you to hide messages in seemingly normal conversation. Only another creature that knows thieves’ cant understands such messages. It takes four times longer to convey such a message than it does to speak the same idea plainly.\n    <br>\n    <br>\n    In addition, you understand a set of secret signs and symbols used to convey short, simple messages, such as whether an area is dangerous or the territory of a thieves’ guild, whether loot is nearby, or whether the people in an area are easy marks or will provide a safe house for thieves on the run.
90	9	2	Cunning Action	Starting at 2nd level, your quick thinking and agility allow you to move and act quickly. You can take a bonus action on each of your turns in combat. This action can be used only to take the Dash, Disengage, or Hide action.
91	9	3	Roguish Archetype	At 3rd level, you choose an archetype that you emulate in the exercise of your rogue abilities: Thief, detailed at the end of the class description, or one from another source. Your archetype choice grants you features at 3rd level and then again at 9th, 13th, and 17th level.
92	9	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 10th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
93	9	5	Uncanny Dodge	Starting at 5th level, when an attacker that you can see hits you with an attack, you can use your reaction to halve the attack’s damage against you.
94	9	7	Evasion	Beginning at 7th level, you can nimbly dodge out of the way of certain area effects, such as an ancient red dragon’s fiery breath or an ice storm spell. When you are subjected to an effect that allows you to make a Dexterity saving throw to take only half damage, you instead take no damage if you succeed on the saving throw, and only half damage if you fail.
95	9	11	Reliable Talent	By 11th level, you have refined your chosen skills until they approach perfection. Whenever you make an ability check that lets you add your proficiency bonus, you can treat a d20 roll of 9 or lower as a 10.
96	9	14	Blindsense	Starting at 14th level, if you are able to hear, you are aware of the location of any hidden or invisible creature within 10 feet of you.
97	9	15	Slippery Mind	By 15th level, you have acquired greater mental strength. You gain proficiency in Wisdom saving throws.
98	9	18	Elusive	Beginning at 18th level, you are so evasive that attackers rarely gain the upper hand against you. No attack roll has advantage against you while you aren’t incapacitated.
99	9	20	Stroke of Luck	At 20th level, you have an uncanny knack for succeeding when you need to. If your attack misses a target within range, you can turn the miss into a hit. Alternatively, if you fail an ability check, you can treat the d20 roll as a 20.\n    <br>\n    <br>\n    Once you use this feature, you can’t use it again until you finish a short or long rest.
100	10	1	Spellcasting	An event in your past, or in the life of a parent or ancestor, left an indelible mark on you, infusing you with arcane magic. This font of magic, whatever its origin, fuels your spells. See Spells Rules for the general rules of spellcasting and the Spells Listing for the sorcerer spell list.\n    <br>\n    <br>\n    Cantrips - At 1st level, you know four cantrips of your choice from the sorcerer spell list. You learn additional sorcerer cantrips of your choice at higher levels, as shown in the Cantrips Known column of the Sorcerer table.\n    <br>\n    <br>\n    Spell Slots - The Sorcerer table shows how many spell slots you have to cast your spells of 1st level and higher. To cast one of these sorcerer spells, you must expend a slot of the spell’s level or higher. You regain all expended spell slots when you finish a long rest.\n    <br>\n    <br>\n    For example, if you know the 1st-level spell burning hands and have a 1st-level and a 2nd-level spell slot available, you can cast burning hands using either slot.\n    <br>\n    <br>\n    Spells Known of 1st Level and Higher - You know two 1st-level spells of your choice from the sorcerer spell list.\n    <br>\n    <br>\n    The Spells Known column of the Sorcerer table shows when you learn more sorcerer spells of your choice. Each of these spells must be of a level for which you have spell slots. For instance, when you reach 3rd level in this class, you can learn one new spell of 1st or 2nd level.\n    <br>\n    <br>\n    Additionally, when you gain a level in this class, you can choose one of the sorcerer spells you know and replace it with another spell from the sorcerer spell list, which also must be of a level for which you have spell slots.\n    <br>\n    <br>\n    Spellcasting Ability - Charisma is your spellcasting ability for your sorcerer spells, since the power of your magic relies on your ability to project your will into the world. You use your Charisma whenever a spell refers to your spellcasting ability. In addition, you use your Charisma modifier when setting the saving throw DC for a sorcerer spell you cast and when making an attack roll with one.\n    <br>\n    <br>\n    Spell save DC = 8 + your proficiency bonus + your Charisma modifier\n    <br>\n    <br>\n    Spell attack modifier = your proficiency bonus + your Charisma modifier\n    <br>\n    <br>\n    Spellcasting Focus - You can use an arcane focus (see the Adventuring Gear section) as a spellcasting focus for your sorcerer spells.
101	10	1	Sorcerous Origin	Choose a sorcerous origin, which describes the source of your innate magical power: Draconic Bloodline, detailed at the end of the class description, or one from another source.\n    <br>\n    <br>\n    Your choice grants you features when you choose it at 1st level and again at 6th, 14th, and 18th level.
102	10	2	Font of Magic	At 2nd level, you tap into a deep wellspring of magic within yourself. This wellspring is represented by sorcery points, which allow you to create a variety of magical effects.\n    <br>\n    <br>\n    Sorcery Points - You have 2 sorcery points, and you gain more as you reach higher levels, as shown in the Sorcery Points column of the Sorcerer table. You can never have more sorcery points than shown on the table for your level. You regain all spent sorcery points when you finish a long rest.\n    <br>\n    <br>\n    Flexible Casting - You can use your sorcery points to gain additional spell slots, or sacrifice spell slots to gain additional sorcery points. You learn other ways to use your sorcery points as you reach higher levels.\n    <br>\n    <br>\n    Creating Spell Slots. You can transform unexpended sorcery points into one spell slot as a bonus action on your turn. The Creating Spell Slots table shows the cost of creating a spell slot of a given level. You can create spell slots no higher in level than 5th.\n    <br>\n    <br>\n    Any spell slot you create with this feature vanishes when you finish a long rest.\n    <br>\n    <br>\n    Creating Spell Slots\n    <br>\n    Spell Slot Level - Sorcery Point Cost\n    <br>\n    1st              - 2\n    <br>\n    2nd              - 3\n    <br>\n    3rd              - 5\n    <br>\n    4th              - 6\n    <br>\n    5th              - 7\n    <br>\n    <br>\n    Converting a Spell Slot to Sorcery Points. As a bonus action on your turn, you can expend one spell slot and gain a number of sorcery points equal to the slot’s level.
103	10	3	Metamagic	At 3rd level, you gain the ability to twist your spells to suit your needs. You gain two of the following Metamagic options of your choice. You gain another one at 10th and 17th level.\n    <br>\n    <br>\n    You can use only one Metamagic option on a spell when you cast it, unless otherwise noted.\n    <br>\n    <br>\n    Careful Spell - When you cast a spell that forces other creatures to make a saving throw, you can protect some of those creatures from the spell’s full force. To do so, you spend 1 sorcery point and choose a number of those creatures up to your Charisma modifier (minimum of one creature). A chosen creature automatically succeeds on its saving throw against the spell.\n    <br>\n    <br>\n    Distant Spell - When you cast a spell that has a range of 5 feet or greater, you can spend 1 sorcery point to double the range of the spell.\n    <br>\n    <br>\n    When you cast a spell that has a range of touch, you can spend 1 sorcery point to make the range of the spell 30 feet.\n    <br>\n    <br>\n    Empowered Spell - When you roll damage for a spell, you can spend 1 sorcery point to reroll a number of the damage dice up to your Charisma modifier (minimum of one). You must use the new rolls.\n    <br>\n    <br>\n    You can use Empowered Spell even if you have already used a different Metamagic option during the casting of the spell.\n    <br>\n    <br>\n    Extended Spell - When you cast a spell that has a duration of 1 minute or longer, you can spend 1 sorcery point to double its duration, to a maximum duration of 24 hours.\n    <br>\n    <br>\n    Heightened Spell - When you cast a spell that forces a creature to make a saving throw to resist its effects, you can spend 3 sorcery points to give one target of the spell disadvantage on its first saving throw made against the spell.\n    <br>\n    <br>\n    Quickened Spell - When you cast a spell that has a casting time of 1 action, you can spend 2 sorcery points to change the casting time to 1 bonus action for this casting.\n    <br>\n    <br>\n    Subtle Spell - When you cast a spell, you can spend 1 sorcery point to cast it without any somatic or verbal components.\n    <br>\n    <br>\n    Twinned Spell - When you cast a spell that targets only one creature and doesn’t have a range of self, you can spend a number of sorcery points equal to the spell’s level to target a second creature in range with the same spell (1 sorcery point if the spell is a cantrip).\n    <br>\n    <br>\n    To be eligible, a spell must be incapable of targeting more than one creature at the spell’s current level. For example, magic missile and scorching ray aren’t eligible, but ray of frost and chromatic orb are.
104	10	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
105	10	20	Sorcerous Restoration	At 20th level, you regain 4 expended sorcery points whenever you finish a short rest.
106	11	1	Otherworldly Patron	At 1st level, you have struck a bargain with an otherworldly being of your choice: the Archfey, which is detailed at the end of the class description, or one from another source. Your choice grants you features at 1st level and again at 6th, 10th, and 14th level.
107	11	1	Pact Magic	Your arcane research and the magic bestowed on you by your patron have given you facility with spells. See Spells Rules for the general rules of spellcasting and the Spells Listing for the warlock spell list.\n    <br>\n    <br>\n    Cantrips - You know two cantrips of your choice from the warlock spell list. You learn additional warlock cantrips of your choice at higher levels, as shown in the Cantrips Known column of the Warlock table.\n    <br>\n    <br>\n    Spell Slots - The Warlock table shows how many spell slots you have. The table also shows what the level of those slots is; all of your spell slots are the same level. To cast one of your warlock spells of 1st level or higher, you must expend a spell slot. You regain all expended spell slots when you finish a short or long rest.\n    <br>\n    <br>\n    For example, when you are 5th level, you have two 3rd-level spell slots. To cast the 1st-level spell witch bolt, you must spend one of those slots, and you cast it as a 3rd-level spell.\n    <br>\n    <br>\n    Spells Known of 1st Level and Higher - At 1st level, you know two 1st-level spells of your choice from the warlock spell list.\n    <br>\n    <br>\n    The Spells Known column of the Warlock table shows when you learn more warlock spells of your choice of 1st level and higher. A spell you choose must be of a level no higher than what’s shown in the table’s Slot Level column for your level. When you reach 6th level, for example, you learn a new warlock spell, which can be 1st, 2nd, or 3rd level.\n    <br>\n    <br>\n    Additionally, when you gain a level in this class, you can choose one of the warlock spells you know and replace it with another spell from the warlock spell list, which also must be of a level for which you have spell slots.\n    <br>\n    <br>\n    Spellcasting Ability - Charisma is your spellcasting ability for your warlock spells, so you use your Charisma whenever a spell refers to your spellcasting ability. In addition, you use your Charisma modifier when setting the saving throw DC for a warlock spell you cast and when making an attack roll with one.\n    <br>\n    <br>\n    Spell save DC = 8 + your proficiency bonus + your Charisma modifier\n    <br>\n    <br>\n    Spell attack modifier = your proficiency bonus + your Charisma modifier\n    <br>\n    <br>\n    Spellcasting Focus\n    You can use an arcane focus (see the Adventuring Gear section) as a spellcasting focus for your warlock spells.
108	11	2	Eldritch Invocations	In your study of occult lore, you have unearthed eldritch invocations, fragments of forbidden knowledge that imbue you with an abiding magical ability.\n    <br>\n    <br>    <br>\n        <br>\n    At 2nd level, you gain two eldritch invocations of your choice. Your invocation options are detailed at the end of the class description. When you gain certain warlock levels, you gain additional invocations of your choice, as shown in the Invocations Known column of the Warlock table.\n    <br>\n    <br>    <br>\n        <br>\n    Additionally, when you gain a level in this class, you can choose one of the invocations you know and replace it with another invocation that you could learn at that level.
109	11	3	Pact Boon	At 3rd level, your otherworldly patron bestows a gift upon you for your loyal service. You gain one of the following features of your choice.\n    <br>\n    <br>\n    Pact of the Chain - You learn the find familiar spell and can cast it as a ritual. The spell doesn’t count against your number of spells known.\n    <br>\n    <br>\n    When you cast the spell, you can choose one of the normal forms for your familiar or one of the following special forms: imp, pseudodragon, quasit, or sprite.\n    <br>\n    <br>\n    Additionally, when you take the Attack action, you can forgo one of your own attacks to allow your familiar to make one attack of its own with its reaction.\n    <br>\n    <br>\n    Pact of the Blade - You can use your action to create a pact weapon in your empty hand. You can choose the form that this melee weapon takes each time you create it (see the Weapons section for weapon options). You are proficient with it while you wield it. This weapon counts as magical for the purpose of overcoming resistance and immunity to nonmagical attacks and damage.\n    <br>\n    <br>\n    Your pact weapon disappears if it is more than 5 feet away from you for 1 minute or more. It also disappears if you use this feature again, if you dismiss the weapon (no action required), or if you die.\n    <br>\n    <br>\n    You can transform one magic weapon into your pact weapon by performing a special ritual while you hold the weapon. You perform the ritual over the course of 1 hour, which can be done during a short rest. You can then dismiss the weapon, shunting it into an extradimensional space, and it appears whenever you create your pact weapon thereafter. You can’t affect an artifact or a sentient weapon in this way. The weapon ceases being your pact weapon if you die, if you perform the 1-hour ritual on a different weapon, or if you use a 1-hour ritual to break your bond to it. The weapon appears at your feet if it is in the extradimensional space when the bond breaks.\n    <br>\n    <br>\n    Pact of the Tome - Your patron gives you a grimoire called a Book of Shadows. When you gain this feature, choose three cantrips from any class’s spell list (the three needn’t be from the same list). While the book is on your person, you can cast those cantrips at will. They don’t count against your number of cantrips known. If they don’t appear on the warlock spell list, they are nonetheless warlock spells for you.\n    <br>\n    <br>\n    If you lose your Book of Shadows, you can perform a 1-hour ceremony to receive a replacement from your patron. This ceremony can be performed during a short or long rest, and it destroys the previous book. The book turns to ash when you die.
110	11	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
111	11	11	Mystic Arcanum	At 11th level, your patron bestows upon you a magical secret called an arcanum. Choose one 6th-level spell from the warlock spell list as this arcanum.\n    <br>\n    <br>\n    You can cast your arcanum spell once without expending a spell slot. You must finish a long rest before you can do so again.\n    <br>\n    <br>\n    At higher levels, you gain more warlock spells of your choice that can be cast in this way: one 7th-level spell at 13th level, one 8th-level spell at 15th level, and one 9th-level spell at 17th level. You regain all uses of your Mystic Arcanum when you finish a long rest.
112	11	20	Eldritch Master	At 20th level, you can draw on your inner reserve of mystical power while entreating your patron to regain expended spell slots. You can spend 1 minute entreating your patron for aid to regain all your expended spell slots from your Pact Magic feature. Once you regain spell slots with this feature, you must finish a long rest before you can do so again.
113	12	1	Spellcasting	As a student of arcane magic, you have a spellbook containing spells that show the first glimmerings of your true power. See Spells Rules for the general rules of spellcasting and the Spells Listing for the wizard spell list.\n<br>\n<br>\n    Cantrips - At 1st level, you know three cantrips of your choice from the wizard spell list. You learn additional wizard cantrips of your choice at higher levels, as shown in the Cantrips Known column of the Wizard table.\n    <br>\n    <br>\n    Spellbook -At 1st level, you have a spellbook containing six 1st-level wizard spells of your choice. Your spellbook is the repository of the wizard spells you know, except your cantrips, which are fixed in your mind.\n    <br>\n    <br>\n    Preparing and Casting Spells - The Wizard table shows how many spell slots you have to cast your spells of 1st level and higher. To cast one of these spells, you must expend a slot of the spell’s level or higher. You regain all expended spell slots when you finish a long rest.\n    <br>\n    <br>\n    You prepare the list of wizard spells that are available for you to cast. To do so, choose a number of wizard spells from your spellbook equal to your Intelligence modifier + your wizard level (minimum of one spell). The spells must be of a level for which you have spell slots.\n    <br>\n    <br>\n    For example, if you’re a 3rd-level wizard, you have four 1st-level and two 2nd-level spell slots. With an Intelligence of 16, your list of prepared spells can include six spells of 1st or 2nd level, in any combination, chosen from your spellbook. If you prepare the 1st-level spell magic missile, you can cast it using a 1st-level or a 2nd-level slot. Casting the spell doesn’t remove it from your list of prepared spells.\n    <br>\n    <br>\n    You can change your list of prepared spells when you finish a long rest. Preparing a new list of wizard spells requires time spent studying your spellbook and memorizing the incantations and gestures you must make to cast the spell: at least 1 minute per spell level for each spell on your list.\n    <br>\n    <br>\n    Spellcasting Ability - Intelligence is your spellcasting ability for your wizard spells, since you learn your spells through dedicated study and memorization. You use your Intelligence whenever a spell refers to your spellcasting ability. In addition, you use your Intelligence modifier when setting the saving throw DC for a wizard spell you cast and when making an attack roll with one.\n    <br>\n    <br>\n    Spell save DC = 8 + your proficiency bonus + your Intelligence modifier\n    <br>\n    <br>\n    Spell attack modifier = your proficiency bonus + your Intelligence modifier\n    <br>\n    <br>\n    Ritual Casting - You can cast a wizard spell as a ritual if that spell has the ritual tag and you have the spell in your spellbook. You don’t need to have the spell prepared.\n    <br>\n    <br>\n    Spellcasting Focus - You can use an arcane focus (see the Adventuring Gear section) as a spellcasting focus for your wizard spells.\n    <br>\n    <br>\n    Learning Spells of 1st Level and Higher - Each time you gain a wizard level, you can add two wizard spells of your choice to your spellbook for free. Each of these spells must be of a level for which you have spell slots, as shown on the Wizard table. On your adventures, you might find other spells that you can add to your spellbook (see the “Your Spellbook” sidebar).
114	12	1	Arcane Recovery	You have learned to regain some of your magical energy by studying your spellbook. Once per day when you finish a short rest, you can choose expended spell slots to recover. The spell slots can have a combined level that is equal to or less than half your wizard level (rounded up), and none of the slots can be 6th level or higher.\n    <br>\n    <br>\n    For example, if you’re a 4th-level wizard, you can recover up to two levels worth of spell slots. You can recover either a 2nd-level spell slot or two 1st-level spell slots.
115	12	2	Arcane Tradition	When you reach 2nd level, you choose an arcane tradition, shaping your practice of magic through one of eight schools: Abjuration, Conjuration, Divination, Enchantment, Evocation, Illusion, Necromancy, or Transmutation. The School of Evocation is detailed at the end of the class description, and more choices are available in other sources.\n    <br>\n    <br>\n    Your choice grants you features at 2nd level and again at 6th, 10th, and 14th level.
116	12	4	Ability Score Improvement	When you reach 4th level, and again at 8th, 12th, 16th, and 19th level, you can increase one ability score of your choice by 2, or you can increase two ability scores of your choice by 1. As normal, you can’t increase an ability score above 20 using this feature.
117	12	18	Spell Mastery	At 18th level, you have achieved such mastery over certain spells that you can cast them at will. Choose a 1st-level wizard spell and a 2nd-level wizard spell that are in your spellbook. You can cast those spells at their lowest level without expending a spell slot when you have them prepared. If you want to cast either spell at a higher level, you must expend a spell slot as normal.\n    <br>\n    <br>\n    By spending 8 hours in study, you can exchange one or both of the spells you chose for different spells of the same levels.
118	12	20	Signature Spells	When you reach 20th level, you gain mastery over two powerful spells and can cast them with little effort. Choose two 3rd-level wizard spells in your spellbook as your signature spells. You always have these spells prepared, they don’t count against the number of spells you have prepared, and you can cast each of them once at 3rd level without expending a spell slot. When you do so, you can’t do so again until you finish a short or long rest.\n    <br>\n    <br>\n    If you want to cast either spell at a higher level, you must expend a spell slot as normal.
\.


--
-- Name: classfeature_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('classfeature_id_seq', 118, true);


--
-- Data for Name: classsaveprof; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY classsaveprof (id, class_id, save) FROM stdin;
1	1	Strength
2	1	Constitution
3	2	Dexterity
4	2	Charisma
5	3	Wisdom
6	3	Charisma
7	4	Intelligence
8	4	Wisdom
9	5	Strength
10	5	Constitution
11	6	Strength
12	6	Dexterity
13	7	Wisdom
14	7	Charisma
15	8	Strength
16	8	Dexterity
17	9	DEXterity
18	9	Intelligence
19	10	Constitution
20	10	Charisma
21	11	Wisdom
22	11	Charisma
23	12	Intelligence
24	12	Wisdom
\.


--
-- Name: classsaveprof_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('classsaveprof_id_seq', 24, true);


--
-- Data for Name: classskillprof; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY classskillprof (id, class_id, skill) FROM stdin;
1	1	Animal Handling
2	1	Athletics
3	1	Intimidation
4	1	Nature
5	1	Perception
6	1	Survival
7	2	Choose any three.
8	3	History
9	3	Insight
10	3	Medicine
11	3	Persuasion
12	3	Religion
13	4	Arcana
14	4	Animal Handling
15	4	Insight
16	4	Medicine
17	4	Nature
18	4	Perception
19	4	Religion
20	4	Survival
21	5	Acrobatics
22	5	Animal Handling
23	5	Athletics
24	5	History
25	5	Insight
26	5	Intimidation
27	5	Perception
28	5	Survival
29	6	Acrobatics
30	6	Athletics
31	6	History
32	6	Insight
33	6	Religion
34	6	Stealth
35	7	Athletics
36	7	Insight
37	7	Intimidation
38	7	Medicine
39	7	Persuasion
40	7	Religion
41	8	Animal Handling
42	8	Athletics
43	8	Insight
44	8	Investigation
45	8	Nature
46	8	Perception
47	8	Stealth
48	8	Survival
49	9	Acrobatics
50	9	Athletics
51	9	Deception
52	9	Insight
53	9	Intimidation
54	9	Investigation
55	9	Perception
56	9	Performance
57	9	Persuasion
58	9	Sleight of Hand
59	9	Stealth
60	10	Arcana
61	10	Deception
62	10	Insight
63	10	Intimidation
64	10	Persuasion
65	10	Religion
66	11	Arcana
67	11	Deception
68	11	History
69	11	Intimidation
70	11	Investigation
71	11	Nature
72	11	Religion
73	12	Arcana
74	12	History
75	12	Insight
76	12	Investigation
77	12	Medicine
78	12	Religion
\.


--
-- Name: classskillprof_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('classskillprof_id_seq', 78, true);


--
-- Data for Name: player; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY player (id, firstname, lastname, username, password) FROM stdin;
1	john	testing	test	$2y$10$M.9w/4F6FTicIj9De5JJUeofl.htcrYx6UCmaiT5D7h3gQ0hNCMY6
\.


--
-- Name: player_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('player_id_seq', 1, true);


--
-- Data for Name: profbonus; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY profbonus (level, bonus) FROM stdin;
1	2
2	2
3	2
4	2
5	3
6	3
7	3
8	3
9	4
10	4
11	4
12	4
13	5
14	5
15	5
16	5
17	6
18	6
19	6
20	6
\.


--
-- Name: profbonus_level_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('profbonus_level_seq', 20, true);


--
-- Data for Name: race; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY race (id, racename, agetext, alignmenttext, sizetext, speedtext, languagestext, hasdarkvison) FROM stdin;
1	Dragonborn	Young dragonborn grow quickly. They walk hours after hatching, attain the size and development of a 10-year-old human child by the age of 3, and reach adulthood by 15. They live to be around 80.	Dragonborn tend to extremes, making a conscious choice for one side or the other in the cosmic war between good and evil (represented by Bahamut and Tiamat, respectively). Most dragonborn are good, but those who side with Tiamat can be terrible villains.	Dragonborn are taller and heavier than humans, standing well over 6 feet tall and averaging almost 250 pounds. Your size is Medium. 	Your base walking speed is 30 feet.	You can speak, read, and write Common and Draconic. Draconic is thought to be one of the oldest languages and is often used in the study of magic. The language sounds harsh to most other creatures and includes numerous hard consonants and sibilants.	f
2	Dwarf	Dwarves mature at the same rate as humans, but they’re considered young until they reach the age of 50. On average, they live about 350 years.	Most dwarves are lawful, believing firmly in the benefits of a well-ordered society. They tend toward good as well, with a strong sense of fair play and a belief that everyone deserves to share in the benefits of a just order.	Dwarves stand between 4 and 5 feet tall and average about 150 pounds. Your size is Medium.	Your base walking speed is 25 feet. Your speed is not reduced by wearing heavy armor.	You can speak, read, and write Common and Dwarvish. Dwarvish is full of hard consonants and guttural sounds, and those characteristics spill over into whatever other language a dwarf might speak.	t
3	Elf	Although elves reach physical maturity at about the same age as humans, the elven understanding of adulthood goes beyond physical growth to encompass worldly experience. An elf typically claims adulthood and an adult name around the age of 100 and can live to be 750 years old.	Elves love freedom, variety, and self-expression, so they lean strongly toward the gentler aspects of chaos. They value and protect others’ freedom as well as their own, and they are more often good than not. The drow are an exception; their exile into the Underdark has made them vicious and dangerous. Drow are more often evil than not.	Elves range from under 5 to over 6 feet tall and have slender builds. Your size is Medium.	Your base walking speed is 30 feet.	You can speak, read, and write Common and Elvish. Elvish is fluid, with subtle intonations and intricate grammar. Elven literature is rich and varied, and their songs and poems are famous among other races. Many bards learn their language so they can add Elvish ballads to their repertoires.	t
4	Gnome	Gnomes mature at the same rate humans do, and most are expected to settle down into an adult life by around age 40. They can live 350 to almost 500 years.	Gnomes are most often good. Those who tend toward law are sages, engineers, researchers, scholars, investigators, or inventors. Those who tend toward chaos are minstrels, tricksters, wanderers, or fanciful jewelers. Gnomes are good-hearted, and even the tricksters among them are more playful than vicious.	Gnomes are between 3 and 4 feet tall and average about 40 pounds. Your size is Small.	Your base walking speed is 25 feet.	You can speak, read, and write Common and Gnomish. The Gnomish language, which uses the Dwarvish script, is renowned for its technical treatises and its catalogs of knowledge about the natural world.	t
5	Half-Elf	Half-elves mature at the same rate humans do and reach adulthood around the age of 20. They live much longer than humans, however, often exceeding 180 years.	Half-elves share the chaotic bent of their elven heritage. They value both personal freedom and creative expression, demonstrating neither love of leaders nor desire for followers. They chafe at rules, resent others’ demands, and sometimes prove unreliable, or at least unpredictable.	Half-elves are about the same size as humans, ranging from 5 to 6 feet tall. Your size is Medium.	Your base walking speed is 30 feet.	You can speak, read, and write Common, Elvish, and one extra language of your choice.	t
6	Halfling	A halfling reaches adulthood at the age of 20 and generally lives into the middle of his or her second century.	Most halflings are lawful good. As a rule, they are good-hearted and kind, hate to see others in pain, and have no tolerance for oppression. They are also very orderly and traditional, leaning heavily on the support of their community and the comfort of their old ways.	Halflings average about 3 feet tall and weigh about 40 pounds. Your size is Small.	Your base walking speed is 25 feet.	You can speak, read, and write Common and Halfling. The Halfling language isn’t secret, but halflings are loath to share it with others. They write very little, so they don’t have a rich body of literature. Their oral tradition, however, is very strong. Almost all halflings speak Common to converse with the people in whose lands they dwell or through which they are traveling.	f
7	Half-Orc	Half-orcs mature a little faster than humans, reaching adulthood around age 14. They age noticeably faster and rarely live longer than 75 years.	Half-orcs inherit a tendency toward chaos from their orc parents and are not strongly inclined toward good. Half-orcs raised among orcs and willing to live out their lives among them are usually evil.	Half-orcs are somewhat larger and bulkier than humans, and they range from 5 to well over 6 feet tall. Your size is Medium.	Your base walking speed is 30 feet.	You can speak, read, and write Common and Orc. Orc is a harsh, grating language with hard consonants. It has no script of its own but is written in the Dwarvish script.	t
8	Human	Humans reach adulthood in their late teens and live less than a century.	Humans tend toward no particular alignment. The best and the worst are found among them.	Humans vary widely in height and build, from barely 5 feet to well over 6 feet tall. Regardless of your position in that range, your size is Medium.	Your base walking speed is 30 feet.	You can speak, read, and write Common and one extra language of your choice. Humans typically learn the languages of other peoples they deal with, including obscure dialects. They are fond of sprinkling their speech with words borrowed from other tongues: Orc curses, Elvish musical expressions, Dwarvish military phrases, and so on.	f
9	Tiefling	Tieflings mature at the same rate as humans but live a few years longer.	Tieflings might not have an innate tendency toward evil, but many of them end up there. Evil or not, an independent nature inclines many tieflings toward a chaotic alignment.	Tieflings are about the same size and build as humans. Your size is Medium.	Your base walking speed is 30 feet.	You can speak, read, and write Common and Infernal.	t
\.


--
-- Name: race_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('race_id_seq', 9, true);


--
-- Data for Name: raceabilityscoreincrease; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY raceabilityscoreincrease (id, race_id, abilityscore, increase) FROM stdin;
1	1	STR	2
2	1	CHA	1
3	2	CON	2
4	3	DEX	2
5	4	INT	2
6	6	DEX	2
7	5	CHA	1
8	5	ANY	1
9	5	ANY	1
10	7	STR	2
11	7	CON	1
12	8	STR	1
13	8	DEX	1
14	8	CON	1
15	8	INT	1
16	8	WIX	1
17	8	CHA	1
18	9	INT	1
19	9	CHA	2
\.


--
-- Name: raceabilityscoreincrease_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('raceabilityscoreincrease_id_seq', 19, true);


--
-- Data for Name: racefeature; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY racefeature (id, race_id, featurename, featuredescription) FROM stdin;
1	1	Draconic Ancestry	You have draconic ancestry. Choose one type of dragon from the Draconic Ancestry table. Your breath weapon and damage resistance are determined by the dragon type, as shown in the table.
2	1	Breath Weapon	You can use your action to exhale destructive energy. Your draconic ancestry determines the size, shape, and damage type of the exhalation.\n    <br>\n    <br>\n    When you use your breath weapon, each creature in the area of the exhalation must make a saving throw, the type of which is determined by your draconic ancestry. The DC for this saving throw equals 8 + your Constitution modifier + your proficiency bonus. A creature takes 2d6 damage on a failed save, and half as much damage on a successful one. The damage increases to 3d6 at 6th level, 4d6 at 11th level, and 5d6 at 16th level.\n    <br>\n    <br>\n    After you use your breath weapon, you can’t use it again until you complete a short or long rest.
3	1	Damage Resistence	You have resistance to the damage type associated with your draconic ancestry.
4	2	Dwarven Resilience	You have advantage on saving throws against poison, and you have resistance against poison damage (explained in the “Combat” section).
5	2	Dwarven Combat Training	You have proficiency with the battleaxe, handaxe, light hammer, and warhammer.
6	2	Tool Proficiency	You gain proficiency with the artisan’s tools of your choice: smith’s tools, brewer’s supplies, or mason’s tools.
7	2	Stonecunning	Whenever you make an Intelligence (History) check related to the origin of stonework, you are considered proficient in the History skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus
8	3	Keen Senses	You have proficiency in the Perception skill.
9	3	Fey Ancestry	You have advantage on saving throws against being charmed, and magic can’t put you to sleep.
10	3	Trance	Elves don’t need to sleep. Instead, they meditate deeply, remaining semiconscious, for 4 hours a day. (The Common word for such meditation is “trance.”) While meditating, you can dream after a fashion; such dreams are actually mental exercises that have become reflexive through years of practice. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.
11	4	Gnome Cunning	You have advantage on all Intelligence, Wisdom, and Charisma saving throws against magic.
12	5	Fey Ancestry	You have advantage on saving throws against being charmed, and magic can’t put you to sleep.
13	5	Skill Versatility	You gain proficiency in two skills of your choice.
14	6	Lucky	When you roll a 1 on the d20 for an attack roll, ability check, or saving throw, you can reroll the die and must use the new roll.
15	6	Brave	You have advantage on saving throws against being frightened.
16	6	Halfling Nimbleness	You can move through the space of any creature that is of a size larger than yours.
17	7	Menacing	You gain proficiency in the Intimidation skill.
18	7	Relentless Endurance	When you are reduced to 0 hit points but not killed outright, you can drop to 1 hit point instead. You can’t use this feature again until you finish a long rest.
19	7	Savage Attacks	When you score a critical hit with a melee weapon attack, you can roll one of the weapon’s damage dice one additional time and add it to the extra damage of the critical hit.
20	9	Hellish Resistance	You have resistance to fire damage.
21	9	Infernal Legacy	You know the thaumaturgy cantrip. When you reach 3rd level, you can cast the hellish rebuke spell as a 2nd-level spell once with this trait and regain the ability to do so when you finish a long rest. When you reach 5th level, you can cast the darkness spell once with this trait and regain the ability to do so when you finish a long rest. Charisma is your spellcasting ability for these spells.
\.


--
-- Name: racefeature_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('racefeature_id_seq', 21, true);


--
-- Data for Name: skill; Type: TABLE DATA; Schema: public; Owner: mtfkybajvycpzz
--

COPY skill (id, skill, abilityscore) FROM stdin;
1	Acrobatics	DEX
2	Animal Handling	WIS
3	Arcana	INT
4	Athletics	STR
5	Deception	CHA
6	History	INT
7	Insight	WIS
8	Intimidation	CHA
9	Investigation	INT
10	Medicine	WIS
11	Nature	INT
12	Perception	WIS
13	Performance	CHA
14	Persuasion	CHA
15	Religion	INT
16	Sleight of Hand	DEX
17	Stealth	DEX
18	Survival	WIS
\.


--
-- Name: skill_id_seq; Type: SEQUENCE SET; Schema: public; Owner: mtfkybajvycpzz
--

SELECT pg_catalog.setval('skill_id_seq', 18, true);


--
-- Name: abilityscoremodifier abilityscoremodifier_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY abilityscoremodifier
    ADD CONSTRAINT abilityscoremodifier_pkey PRIMARY KEY (score);


--
-- Name: abilityscores abilityscores_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY abilityscores
    ADD CONSTRAINT abilityscores_pkey PRIMARY KEY (id);


--
-- Name: character character_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY "character"
    ADD CONSTRAINT character_pkey PRIMARY KEY (id);


--
-- Name: characterproficiency characterproficiency_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY characterproficiency
    ADD CONSTRAINT characterproficiency_pkey PRIMARY KEY (id);


--
-- Name: class class_classname_key; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY class
    ADD CONSTRAINT class_classname_key UNIQUE (classname);


--
-- Name: class class_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY class
    ADD CONSTRAINT class_pkey PRIMARY KEY (id);


--
-- Name: classequipmentprof classequipmentprof_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classequipmentprof
    ADD CONSTRAINT classequipmentprof_pkey PRIMARY KEY (id);


--
-- Name: classfeature classfeature_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classfeature
    ADD CONSTRAINT classfeature_pkey PRIMARY KEY (id);


--
-- Name: classsaveprof classsaveprof_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classsaveprof
    ADD CONSTRAINT classsaveprof_pkey PRIMARY KEY (id);


--
-- Name: classskillprof classskillprof_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classskillprof
    ADD CONSTRAINT classskillprof_pkey PRIMARY KEY (id);


--
-- Name: player player_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY player
    ADD CONSTRAINT player_pkey PRIMARY KEY (id);


--
-- Name: player player_username_key; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY player
    ADD CONSTRAINT player_username_key UNIQUE (username);


--
-- Name: profbonus profbonus_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY profbonus
    ADD CONSTRAINT profbonus_pkey PRIMARY KEY (level);


--
-- Name: race race_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY race
    ADD CONSTRAINT race_pkey PRIMARY KEY (id);


--
-- Name: race race_racename_key; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY race
    ADD CONSTRAINT race_racename_key UNIQUE (racename);


--
-- Name: raceabilityscoreincrease raceabilityscoreincrease_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY raceabilityscoreincrease
    ADD CONSTRAINT raceabilityscoreincrease_pkey PRIMARY KEY (id);


--
-- Name: racefeature racefeature_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY racefeature
    ADD CONSTRAINT racefeature_pkey PRIMARY KEY (id);


--
-- Name: skill skill_pkey; Type: CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY skill
    ADD CONSTRAINT skill_pkey PRIMARY KEY (id);


--
-- Name: abilityscores abilityscores_character_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY abilityscores
    ADD CONSTRAINT abilityscores_character_id_fkey FOREIGN KEY (character_id) REFERENCES "character"(id);


--
-- Name: character character_class_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY "character"
    ADD CONSTRAINT character_class_id_fkey FOREIGN KEY (class_id) REFERENCES class(id);


--
-- Name: character character_player_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY "character"
    ADD CONSTRAINT character_player_id_fkey FOREIGN KEY (player_id) REFERENCES player(id);


--
-- Name: character character_race_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY "character"
    ADD CONSTRAINT character_race_id_fkey FOREIGN KEY (race_id) REFERENCES race(id);


--
-- Name: characterproficiency characterproficiency_character_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY characterproficiency
    ADD CONSTRAINT characterproficiency_character_id_fkey FOREIGN KEY (character_id) REFERENCES "character"(id);


--
-- Name: classequipmentprof classequipmentprof_class_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classequipmentprof
    ADD CONSTRAINT classequipmentprof_class_id_fkey FOREIGN KEY (class_id) REFERENCES class(id);


--
-- Name: classfeature classfeature_class_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classfeature
    ADD CONSTRAINT classfeature_class_id_fkey FOREIGN KEY (class_id) REFERENCES class(id);


--
-- Name: classsaveprof classsaveprof_class_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classsaveprof
    ADD CONSTRAINT classsaveprof_class_id_fkey FOREIGN KEY (class_id) REFERENCES class(id);


--
-- Name: classskillprof classskillprof_class_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY classskillprof
    ADD CONSTRAINT classskillprof_class_id_fkey FOREIGN KEY (class_id) REFERENCES class(id);


--
-- Name: raceabilityscoreincrease raceabilityscoreincrease_race_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY raceabilityscoreincrease
    ADD CONSTRAINT raceabilityscoreincrease_race_id_fkey FOREIGN KEY (race_id) REFERENCES race(id);


--
-- Name: racefeature racefeature_race_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: mtfkybajvycpzz
--

ALTER TABLE ONLY racefeature
    ADD CONSTRAINT racefeature_race_id_fkey FOREIGN KEY (race_id) REFERENCES race(id);


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO mtfkybajvycpzz;


--
-- PostgreSQL database dump complete
--

