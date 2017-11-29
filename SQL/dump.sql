--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

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
-- Name: agenda; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE agenda (
    id integer NOT NULL,
    idcategoria integer,
    oque character varying(50),
    quando character varying(50),
    onde character varying(50)
);


ALTER TABLE public.agenda OWNER TO escolasnewpoint;

--
-- Name: agenda_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE agenda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.agenda_id_seq OWNER TO escolasnewpoint;

--
-- Name: agenda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE agenda_id_seq OWNED BY agenda.id;


--
-- Name: agenda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('agenda_id_seq', 1, false);


--
-- Name: album; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE album (
    id integer NOT NULL,
    titulo character varying(100),
    idunidade integer,
    descricao text,
    data_do_evento date,
    data_de_criacao date
);


ALTER TABLE public.album OWNER TO escolasnewpoint;

--
-- Name: album_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE album_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.album_id_seq OWNER TO escolasnewpoint;

--
-- Name: album_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE album_id_seq OWNED BY album.id;


--
-- Name: album_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('album_id_seq', 1, false);


--
-- Name: areadoalunojogos; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE areadoalunojogos (
    id integer NOT NULL,
    titulo character varying(50),
    link character varying(255)
);


ALTER TABLE public.areadoalunojogos OWNER TO escolasnewpoint;

--
-- Name: areadoalunojogos_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE areadoalunojogos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.areadoalunojogos_id_seq OWNER TO escolasnewpoint;

--
-- Name: areadoalunojogos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE areadoalunojogos_id_seq OWNED BY areadoalunojogos.id;


--
-- Name: areadoalunojogos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('areadoalunojogos_id_seq', 1, false);


--
-- Name: aulademonstrativa; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE aulademonstrativa (
    id integer NOT NULL,
    nome character varying(100),
    email character varying(255),
    idcidade integer,
    endereco character varying(100),
    telefone character(14)
);


ALTER TABLE public.aulademonstrativa OWNER TO escolasnewpoint;

--
-- Name: aulademonstrativa_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE aulademonstrativa_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aulademonstrativa_id_seq OWNER TO escolasnewpoint;

--
-- Name: aulademonstrativa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE aulademonstrativa_id_seq OWNED BY aulademonstrativa.id;


--
-- Name: aulademonstrativa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('aulademonstrativa_id_seq', 1, false);


--
-- Name: banners; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE banners (
    id integer NOT NULL,
    titulo character varying(100),
    subtitulo character varying(100),
    link character varying(255),
    imagem character varying(255)
);


ALTER TABLE public.banners OWNER TO escolasnewpoint;

--
-- Name: banners_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE banners_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.banners_id_seq OWNER TO escolasnewpoint;

--
-- Name: banners_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE banners_id_seq OWNED BY banners.id;


--
-- Name: banners_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('banners_id_seq', 1, false);


--
-- Name: cargos; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE cargos (
    id integer NOT NULL,
    nome character varying(50)
);


ALTER TABLE public.cargos OWNER TO escolasnewpoint;

--
-- Name: cargos_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE cargos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cargos_id_seq OWNER TO escolasnewpoint;

--
-- Name: cargos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE cargos_id_seq OWNED BY cargos.id;


--
-- Name: cargos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('cargos_id_seq', 1, false);


--
-- Name: categoriaagendamento; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE categoriaagendamento (
    id integer NOT NULL,
    nome character varying(255)
);


ALTER TABLE public.categoriaagendamento OWNER TO escolasnewpoint;

--
-- Name: categoriaagendamento_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE categoriaagendamento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoriaagendamento_id_seq OWNER TO escolasnewpoint;

--
-- Name: categoriaagendamento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE categoriaagendamento_id_seq OWNED BY categoriaagendamento.id;


--
-- Name: categoriaagendamento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('categoriaagendamento_id_seq', 1, false);


--
-- Name: categorianoticia; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE categorianoticia (
    id integer NOT NULL,
    nome character varying(50)
);


ALTER TABLE public.categorianoticia OWNER TO escolasnewpoint;

--
-- Name: categorianoticia_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE categorianoticia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorianoticia_id_seq OWNER TO escolasnewpoint;

--
-- Name: categorianoticia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE categorianoticia_id_seq OWNED BY categorianoticia.id;


--
-- Name: categorianoticia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('categorianoticia_id_seq', 3, true);


--
-- Name: cidades; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE cidades (
    id integer NOT NULL,
    idestado integer,
    nome character varying(100)
);


ALTER TABLE public.cidades OWNER TO escolasnewpoint;

--
-- Name: cidades_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE cidades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cidades_id_seq OWNER TO escolasnewpoint;

--
-- Name: cidades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE cidades_id_seq OWNED BY cidades.id;


--
-- Name: cidades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('cidades_id_seq', 4, true);


--
-- Name: curriculos; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE curriculos (
    id integer NOT NULL,
    nome character varying(100),
    email character varying(255),
    mensagem character varying(255)
);


ALTER TABLE public.curriculos OWNER TO escolasnewpoint;

--
-- Name: curriculos_has_vagas; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE curriculos_has_vagas (
    id integer NOT NULL,
    idcurriculo integer,
    idvaga integer
);


ALTER TABLE public.curriculos_has_vagas OWNER TO escolasnewpoint;

--
-- Name: curriculos_has_vagas_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE curriculos_has_vagas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.curriculos_has_vagas_id_seq OWNER TO escolasnewpoint;

--
-- Name: curriculos_has_vagas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE curriculos_has_vagas_id_seq OWNED BY curriculos_has_vagas.id;


--
-- Name: curriculos_has_vagas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('curriculos_has_vagas_id_seq', 1, false);


--
-- Name: curriculos_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE curriculos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.curriculos_id_seq OWNER TO escolasnewpoint;

--
-- Name: curriculos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE curriculos_id_seq OWNED BY curriculos.id;


--
-- Name: curriculos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('curriculos_id_seq', 1, false);


--
-- Name: cursos; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE cursos (
    id integer NOT NULL,
    nome character varying(100)
);


ALTER TABLE public.cursos OWNER TO escolasnewpoint;

--
-- Name: cursos_has_modulos; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE cursos_has_modulos (
    id integer NOT NULL,
    idcurso integer,
    idmodulo integer
);


ALTER TABLE public.cursos_has_modulos OWNER TO escolasnewpoint;

--
-- Name: cursos_has_modulos_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE cursos_has_modulos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cursos_has_modulos_id_seq OWNER TO escolasnewpoint;

--
-- Name: cursos_has_modulos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE cursos_has_modulos_id_seq OWNED BY cursos_has_modulos.id;


--
-- Name: cursos_has_modulos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('cursos_has_modulos_id_seq', 5, true);


--
-- Name: cursos_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE cursos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cursos_id_seq OWNER TO escolasnewpoint;

--
-- Name: cursos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE cursos_id_seq OWNED BY cursos.id;


--
-- Name: cursos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('cursos_id_seq', 1, true);


--
-- Name: empresaconvenio; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE empresaconvenio (
    id integer NOT NULL,
    nome character varying(100),
    idcidade integer,
    endereco character varying(100),
    telefone character varying(14),
    desconto character varying(4)
);


ALTER TABLE public.empresaconvenio OWNER TO escolasnewpoint;

--
-- Name: empresaconvenio_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE empresaconvenio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.empresaconvenio_id_seq OWNER TO escolasnewpoint;

--
-- Name: empresaconvenio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE empresaconvenio_id_seq OWNED BY empresaconvenio.id;


--
-- Name: empresaconvenio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('empresaconvenio_id_seq', 3, true);


--
-- Name: estados; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE estados (
    id integer NOT NULL,
    nome character varying(150),
    uf character(2)
);


ALTER TABLE public.estados OWNER TO escolasnewpoint;

--
-- Name: estados_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE estados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estados_id_seq OWNER TO escolasnewpoint;

--
-- Name: estados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE estados_id_seq OWNED BY estados.id;


--
-- Name: estados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('estados_id_seq', 1, true);


--
-- Name: galeriafotos; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE galeriafotos (
    id integer NOT NULL,
    idalbum integer,
    title character varying(100),
    imagem character varying(255)
);


ALTER TABLE public.galeriafotos OWNER TO escolasnewpoint;

--
-- Name: galeriafotos_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE galeriafotos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galeriafotos_id_seq OWNER TO escolasnewpoint;

--
-- Name: galeriafotos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE galeriafotos_id_seq OWNED BY galeriafotos.id;


--
-- Name: galeriafotos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('galeriafotos_id_seq', 1, false);


--
-- Name: instituicao; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE instituicao (
    id integer NOT NULL,
    texto_principal text,
    missao text,
    visao text,
    imagem character varying(255),
    texto_empresas_conveniadas text
);


ALTER TABLE public.instituicao OWNER TO escolasnewpoint;

--
-- Name: instituicao_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE instituicao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.instituicao_id_seq OWNER TO escolasnewpoint;

--
-- Name: instituicao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE instituicao_id_seq OWNED BY instituicao.id;


--
-- Name: instituicao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('instituicao_id_seq', 1, true);


--
-- Name: materiais; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE materiais (
    id integer NOT NULL,
    titulo character varying(255),
    aplicacao character varying(255),
    idcurso integer,
    idprofessor integer
);


ALTER TABLE public.materiais OWNER TO escolasnewpoint;

--
-- Name: materiais_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE materiais_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.materiais_id_seq OWNER TO escolasnewpoint;

--
-- Name: materiais_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE materiais_id_seq OWNED BY materiais.id;


--
-- Name: materiais_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('materiais_id_seq', 1, false);


--
-- Name: materiaisarquivos; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE materiaisarquivos (
    id integer NOT NULL,
    idmaterial integer,
    nomearquivo character varying(255)
);


ALTER TABLE public.materiaisarquivos OWNER TO escolasnewpoint;

--
-- Name: materiaisarquivos_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE materiaisarquivos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.materiaisarquivos_id_seq OWNER TO escolasnewpoint;

--
-- Name: materiaisarquivos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE materiaisarquivos_id_seq OWNED BY materiaisarquivos.id;


--
-- Name: materiaisarquivos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('materiaisarquivos_id_seq', 1, false);


--
-- Name: modulos; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE modulos (
    id integer NOT NULL,
    titulo character varying(50),
    cargahoraria integer
);


ALTER TABLE public.modulos OWNER TO escolasnewpoint;

--
-- Name: modulos_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE modulos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.modulos_id_seq OWNER TO escolasnewpoint;

--
-- Name: modulos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE modulos_id_seq OWNED BY modulos.id;


--
-- Name: modulos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('modulos_id_seq', 5, true);


--
-- Name: nivelamentoalternativas; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE nivelamentoalternativas (
    id integer NOT NULL,
    descricao character varying(255),
    idquestao integer
);


ALTER TABLE public.nivelamentoalternativas OWNER TO escolasnewpoint;

--
-- Name: nivelamentoalternativas_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE nivelamentoalternativas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nivelamentoalternativas_id_seq OWNER TO escolasnewpoint;

--
-- Name: nivelamentoalternativas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE nivelamentoalternativas_id_seq OWNED BY nivelamentoalternativas.id;


--
-- Name: nivelamentoalternativas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('nivelamentoalternativas_id_seq', 1, false);


--
-- Name: nivelamentocandidatos; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE nivelamentocandidatos (
    id integer NOT NULL
);


ALTER TABLE public.nivelamentocandidatos OWNER TO escolasnewpoint;

--
-- Name: nivelamentocandidatos_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE nivelamentocandidatos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nivelamentocandidatos_id_seq OWNER TO escolasnewpoint;

--
-- Name: nivelamentocandidatos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE nivelamentocandidatos_id_seq OWNED BY nivelamentocandidatos.id;


--
-- Name: nivelamentocandidatos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('nivelamentocandidatos_id_seq', 1, false);


--
-- Name: nivelamentonotas; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE nivelamentonotas (
    id integer NOT NULL,
    idcandidato integer,
    nota numeric
);


ALTER TABLE public.nivelamentonotas OWNER TO escolasnewpoint;

--
-- Name: nivelamentonotas_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE nivelamentonotas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nivelamentonotas_id_seq OWNER TO escolasnewpoint;

--
-- Name: nivelamentonotas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE nivelamentonotas_id_seq OWNED BY nivelamentonotas.id;


--
-- Name: nivelamentonotas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('nivelamentonotas_id_seq', 1, false);


--
-- Name: nivelamentoquestoes; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE nivelamentoquestoes (
    id integer NOT NULL,
    descricao character varying(255)
);


ALTER TABLE public.nivelamentoquestoes OWNER TO escolasnewpoint;

--
-- Name: nivelamentoquestoes_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE nivelamentoquestoes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nivelamentoquestoes_id_seq OWNER TO escolasnewpoint;

--
-- Name: nivelamentoquestoes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE nivelamentoquestoes_id_seq OWNED BY nivelamentoquestoes.id;


--
-- Name: nivelamentoquestoes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('nivelamentoquestoes_id_seq', 1, false);


--
-- Name: nivelamentorespostas; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE nivelamentorespostas (
    id integer NOT NULL,
    idquestao integer,
    idalternativa integer,
    idcandidato integer
);


ALTER TABLE public.nivelamentorespostas OWNER TO escolasnewpoint;

--
-- Name: nivelamentorespostas_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE nivelamentorespostas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nivelamentorespostas_id_seq OWNER TO escolasnewpoint;

--
-- Name: nivelamentorespostas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE nivelamentorespostas_id_seq OWNED BY nivelamentorespostas.id;


--
-- Name: nivelamentorespostas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('nivelamentorespostas_id_seq', 1, false);


--
-- Name: noticia; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE noticia (
    id integer NOT NULL,
    idcategoria integer,
    titulo character varying(255),
    texto text,
    imagem character varying(255),
    data date,
    manchete character varying(255),
    rank integer
);


ALTER TABLE public.noticia OWNER TO escolasnewpoint;

--
-- Name: noticia_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE noticia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.noticia_id_seq OWNER TO escolasnewpoint;

--
-- Name: noticia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE noticia_id_seq OWNED BY noticia.id;


--
-- Name: noticia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('noticia_id_seq', 8, true);


--
-- Name: perfis; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE perfis (
    id integer NOT NULL,
    nome character varying(255)
);


ALTER TABLE public.perfis OWNER TO escolasnewpoint;

--
-- Name: perfis_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE perfis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perfis_id_seq OWNER TO escolasnewpoint;

--
-- Name: perfis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE perfis_id_seq OWNED BY perfis.id;


--
-- Name: perfis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('perfis_id_seq', 1, false);


--
-- Name: sac; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE sac (
    id integer NOT NULL,
    nome character varying(255),
    ctr character varying(10),
    email character varying(255),
    idunidade integer,
    mensagem text
);


ALTER TABLE public.sac OWNER TO escolasnewpoint;

--
-- Name: sac_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE sac_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sac_id_seq OWNER TO escolasnewpoint;

--
-- Name: sac_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE sac_id_seq OWNED BY sac.id;


--
-- Name: sac_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('sac_id_seq', 1, false);


--
-- Name: tipovaga; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE tipovaga (
    id integer NOT NULL,
    nome character varying(50)
);


ALTER TABLE public.tipovaga OWNER TO escolasnewpoint;

--
-- Name: tipovaga_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE tipovaga_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipovaga_id_seq OWNER TO escolasnewpoint;

--
-- Name: tipovaga_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE tipovaga_id_seq OWNED BY tipovaga.id;


--
-- Name: tipovaga_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('tipovaga_id_seq', 1, false);


--
-- Name: turno; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE turno (
    id integer NOT NULL,
    nome character varying(50)
);


ALTER TABLE public.turno OWNER TO escolasnewpoint;

--
-- Name: turno_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE turno_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.turno_id_seq OWNER TO escolasnewpoint;

--
-- Name: turno_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE turno_id_seq OWNED BY turno.id;


--
-- Name: turno_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('turno_id_seq', 1, false);


--
-- Name: unidades; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE unidades (
    id integer NOT NULL,
    idcidade integer,
    endereco character varying(100),
    telefone character varying(18),
    imagem_unidade character varying(255),
    imagem_mapa character varying(255)
);


ALTER TABLE public.unidades OWNER TO escolasnewpoint;

--
-- Name: unidades_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE unidades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.unidades_id_seq OWNER TO escolasnewpoint;

--
-- Name: unidades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE unidades_id_seq OWNED BY unidades.id;


--
-- Name: unidades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('unidades_id_seq', 1, false);


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE usuario (
    id integer NOT NULL,
    nome character varying(255),
    idunidade integer,
    idperfil integer
);


ALTER TABLE public.usuario OWNER TO escolasnewpoint;

--
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO escolasnewpoint;

--
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE usuario_id_seq OWNED BY usuario.id;


--
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('usuario_id_seq', 1, false);


--
-- Name: vagas; Type: TABLE; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

CREATE TABLE vagas (
    id integer NOT NULL,
    titulo character varying(100),
    idcargo integer,
    idtipo integer,
    idturno integer,
    idcidade integer,
    descricao text
);


ALTER TABLE public.vagas OWNER TO escolasnewpoint;

--
-- Name: vagas_id_seq; Type: SEQUENCE; Schema: public; Owner: escolasnewpoint
--

CREATE SEQUENCE vagas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vagas_id_seq OWNER TO escolasnewpoint;

--
-- Name: vagas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: escolasnewpoint
--

ALTER SEQUENCE vagas_id_seq OWNED BY vagas.id;


--
-- Name: vagas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: escolasnewpoint
--

SELECT pg_catalog.setval('vagas_id_seq', 1, false);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE agenda ALTER COLUMN id SET DEFAULT nextval('agenda_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE album ALTER COLUMN id SET DEFAULT nextval('album_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE areadoalunojogos ALTER COLUMN id SET DEFAULT nextval('areadoalunojogos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE aulademonstrativa ALTER COLUMN id SET DEFAULT nextval('aulademonstrativa_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE banners ALTER COLUMN id SET DEFAULT nextval('banners_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE cargos ALTER COLUMN id SET DEFAULT nextval('cargos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE categoriaagendamento ALTER COLUMN id SET DEFAULT nextval('categoriaagendamento_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE categorianoticia ALTER COLUMN id SET DEFAULT nextval('categorianoticia_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE cidades ALTER COLUMN id SET DEFAULT nextval('cidades_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE curriculos ALTER COLUMN id SET DEFAULT nextval('curriculos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE curriculos_has_vagas ALTER COLUMN id SET DEFAULT nextval('curriculos_has_vagas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE cursos ALTER COLUMN id SET DEFAULT nextval('cursos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE cursos_has_modulos ALTER COLUMN id SET DEFAULT nextval('cursos_has_modulos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE empresaconvenio ALTER COLUMN id SET DEFAULT nextval('empresaconvenio_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE estados ALTER COLUMN id SET DEFAULT nextval('estados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE galeriafotos ALTER COLUMN id SET DEFAULT nextval('galeriafotos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE instituicao ALTER COLUMN id SET DEFAULT nextval('instituicao_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE materiais ALTER COLUMN id SET DEFAULT nextval('materiais_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE materiaisarquivos ALTER COLUMN id SET DEFAULT nextval('materiaisarquivos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE modulos ALTER COLUMN id SET DEFAULT nextval('modulos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE nivelamentoalternativas ALTER COLUMN id SET DEFAULT nextval('nivelamentoalternativas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE nivelamentocandidatos ALTER COLUMN id SET DEFAULT nextval('nivelamentocandidatos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE nivelamentonotas ALTER COLUMN id SET DEFAULT nextval('nivelamentonotas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE nivelamentoquestoes ALTER COLUMN id SET DEFAULT nextval('nivelamentoquestoes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE nivelamentorespostas ALTER COLUMN id SET DEFAULT nextval('nivelamentorespostas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE noticia ALTER COLUMN id SET DEFAULT nextval('noticia_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE perfis ALTER COLUMN id SET DEFAULT nextval('perfis_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE sac ALTER COLUMN id SET DEFAULT nextval('sac_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE tipovaga ALTER COLUMN id SET DEFAULT nextval('tipovaga_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE turno ALTER COLUMN id SET DEFAULT nextval('turno_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE unidades ALTER COLUMN id SET DEFAULT nextval('unidades_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE usuario ALTER COLUMN id SET DEFAULT nextval('usuario_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE vagas ALTER COLUMN id SET DEFAULT nextval('vagas_id_seq'::regclass);


--
-- Data for Name: agenda; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: album; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: areadoalunojogos; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: aulademonstrativa; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: banners; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: cargos; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: categoriaagendamento; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: categorianoticia; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--

INSERT INTO categorianoticia VALUES (1, 'eventos');
INSERT INTO categorianoticia VALUES (2, 'comemorações');
INSERT INTO categorianoticia VALUES (3, 'confraternizações');


--
-- Data for Name: cidades; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--

INSERT INTO cidades VALUES (1, 1, 'Porto Alegre');
INSERT INTO cidades VALUES (2, 1, 'Canoas');
INSERT INTO cidades VALUES (3, 1, 'Novo Hamburgo');
INSERT INTO cidades VALUES (4, 1, 'São Leopoldo');


--
-- Data for Name: curriculos; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: curriculos_has_vagas; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: cursos; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--

INSERT INTO cursos VALUES (1, 'Regular Newpoint');


--
-- Data for Name: cursos_has_modulos; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--

INSERT INTO cursos_has_modulos VALUES (1, 1, 1);
INSERT INTO cursos_has_modulos VALUES (2, 1, 2);
INSERT INTO cursos_has_modulos VALUES (3, 1, 3);
INSERT INTO cursos_has_modulos VALUES (4, 1, 4);
INSERT INTO cursos_has_modulos VALUES (5, 1, 5);


--
-- Data for Name: empresaconvenio; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--

INSERT INTO empresaconvenio VALUES (1, 'Unimed', 2, 'Rua das alamedas', '(51)3362-1234', '20%');
INSERT INTO empresaconvenio VALUES (2, 'Porto Verde', 2, 'Rua dos Quincas', '(51)3222-6222', '5%');
INSERT INTO empresaconvenio VALUES (3, 'Tramontina', 1, 'Rua dos alemães', '(51)3464-1464', '30%');


--
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--

INSERT INTO estados VALUES (1, 'Rio Grande do Sul', 'RS');


--
-- Data for Name: galeriafotos; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: instituicao; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--

INSERT INTO instituicao VALUES (1, '<p>
	  			Ser diferenciado, ser inovador, ser mais que uma Escola. 
				O nome New Point surgiu com a proposta de ser o lugar onde as pessoas irão aprender e desenvolver suas habilidades, e assim conquistar todos os seus objetivos. 
			</p>
			<p>
				A New Point iniciou sua história na cidade de Estrela em 1995, o objetivo era formar 100 pessoas em seu primeiro ano de atividade, mas já no seu primeiro mês, mais de 200 alunos se matriculariam e assim começava uma história de sucesso, da Escola e dos seus alunos. Assim no final do primeiro ano de operação, a New Point já contava com cinco Escolas e diversas opções de formação. Com o passar dos anos nos tornamos referência de Capacitação Profissional. A escola tem o privilégio de ter formado mais de 500.000 alunos nas áreas de Informática, Rotinas Administrativas e Inglês.
			</p>
			<p>
				Atualmente a Escola New Point possui uma infraestrutura diferenciada e uma equipe altamente profissionalizada, sem nunca perder a noção exata de sua essência, de estar próximo aos alunos e o compromisso de gerar crescimento para os mesmos.
			</p>', '<p>Ensinar Inglês E Informática Para O Desenvolvimento Pessoal E Profissional. </p>', '<p id="visao">Ser Reconhecida Como Referencia Em Cursos De Informática E Inglês Na Região Metropolitana De Porto Alegre Até 2014.</p>', NULL, '<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel aliquam metus. Donec ultrices eleifend nunc at mollis. Curabitur sit amet purus mauris, condimentum malesuada lorem. Aliquam consequat venenatis eros luctus ornare. Etiam posuere metus nisi. Class aptent
			taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent interdum justo ac nisi eleifend sed con
  		</p>');


--
-- Data for Name: materiais; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: materiaisarquivos; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: modulos; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--

INSERT INTO modulos VALUES (1, 'Windows', 20);
INSERT INTO modulos VALUES (2, 'Word', 10);
INSERT INTO modulos VALUES (3, 'Excel', 30);
INSERT INTO modulos VALUES (4, 'PowerPoint', 15);
INSERT INTO modulos VALUES (5, 'Internet', 5);


--
-- Data for Name: nivelamentoalternativas; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: nivelamentocandidatos; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: nivelamentonotas; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: nivelamentoquestoes; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: nivelamentorespostas; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: noticia; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--

INSERT INTO noticia VALUES (4, 1, 'noticia 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis congue accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sit amet erat ac libero molestie accumsan. Vestibulum posuere tempor erat, ut semper diam dictum at. Sed nec orci quam. Quisque velit ligula, facilisis nec lacinia in, ultrices sed tellus. Fusce nec nisi sapien, a congue lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis vehicula fermentum ultrices.

Donec gravida euismod pellentesque. Nam elit felis, scelerisque quis elementum eget, auctor et ante. Nunc eget sapien non mi molestie aliquam eu eu ligula. In hac habitasse platea dictumst. Maecenas vehicula, purus vitae aliquet euismod, dui lacus blandit magna, a sollicitudin eros purus at tortor. Curabitur rhoncus auctor egestas. Donec ac ligula ut est consequat suscipit. Aenean cursus mi ac velit placerat ullamcorper. Integer dignissim feugiat risus, at scelerisque ipsum venenatis non. Vestibulum imperdiet sollicitudin neque sit amet imperdiet. Praesent tincidunt neque vel tortor scelerisque nec posuere odio ornare. Duis commodo rutrum nulla et hendrerit. Cras tristique, lectus a iaculis ornare, dui tellus laoreet risus, at pharetra velit sem et nunc.

Vestibulum ornare massa vitae metus elementum fringilla. Duis vestibulum ligula et ipsum luctus faucibus. Proin vel ullamcorper augue. Nunc quis interdum sapien. Nullam scelerisque augue sit amet sem sollicitudin eu facilisis risus porta. Integer vitae mollis magna. In hac habitasse platea dictumst. Cras sed nisl urna. Sed sodales ultrices lacinia. Fusce et nunc vitae velit porttitor posuere eu quis est. Donec libero justo, varius ut rutrum eu, facilisis nec nibh. Vestibulum semper feugiat facilisis. Suspendisse potenti. Morbi molestie ligula sed dui volutpat a luctus purus laoreet. In eget neque mi. Proin ac porta elit

Praesent fermentum eros eget eros ultricies pretium. Proin a nunc odio, eget laoreet metus. Maecenas mattis, dolor et congue hendrerit, diam nibh euismod nibh, ornare sagittis velit nulla quis enim. In non lorem ut nunc volutpat luctus id eu lectus. Curabitur bibendum diam quis nulla ullamcorper eu blandit nisl faucibus. Sed tempus euismod mollis. Praesent elementum interdum ante, non euismod nisi elementum malesuada. Aliquam ac mauris diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'thumb_img_noticia.jpg', '2012-09-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.(manchete)', 56);
INSERT INTO noticia VALUES (5, 1, 'noticia 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis congue accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sit amet erat ac libero molestie accumsan. Vestibulum posuere tempor erat, ut semper diam dictum at. Sed nec orci quam. Quisque velit ligula, facilisis nec lacinia in, ultrices sed tellus. Fusce nec nisi sapien, a congue lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis vehicula fermentum ultrices.

Donec gravida euismod pellentesque. Nam elit felis, scelerisque quis elementum eget, auctor et ante. Nunc eget sapien non mi molestie aliquam eu eu ligula. In hac habitasse platea dictumst. Maecenas vehicula, purus vitae aliquet euismod, dui lacus blandit magna, a sollicitudin eros purus at tortor. Curabitur rhoncus auctor egestas. Donec ac ligula ut est consequat suscipit. Aenean cursus mi ac velit placerat ullamcorper. Integer dignissim feugiat risus, at scelerisque ipsum venenatis non. Vestibulum imperdiet sollicitudin neque sit amet imperdiet. Praesent tincidunt neque vel tortor scelerisque nec posuere odio ornare. Duis commodo rutrum nulla et hendrerit. Cras tristique, lectus a iaculis ornare, dui tellus laoreet risus, at pharetra velit sem et nunc.

Vestibulum ornare massa vitae metus elementum fringilla. Duis vestibulum ligula et ipsum luctus faucibus. Proin vel ullamcorper augue. Nunc quis interdum sapien. Nullam scelerisque augue sit amet sem sollicitudin eu facilisis risus porta. Integer vitae mollis magna. In hac habitasse platea dictumst. Cras sed nisl urna. Sed sodales ultrices lacinia. Fusce et nunc vitae velit porttitor posuere eu quis est. Donec libero justo, varius ut rutrum eu, facilisis nec nibh. Vestibulum semper feugiat facilisis. Suspendisse potenti. Morbi molestie ligula sed dui volutpat a luctus purus laoreet. In eget neque mi. Proin ac porta elit

Praesent fermentum eros eget eros ultricies pretium. Proin a nunc odio, eget laoreet metus. Maecenas mattis, dolor et congue hendrerit, diam nibh euismod nibh, ornare sagittis velit nulla quis enim. In non lorem ut nunc volutpat luctus id eu lectus. Curabitur bibendum diam quis nulla ullamcorper eu blandit nisl faucibus. Sed tempus euismod mollis. Praesent elementum interdum ante, non euismod nisi elementum malesuada. Aliquam ac mauris diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
', 'thumb_img_noticia.jpg', '2012-09-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.(manchete)', 25);
INSERT INTO noticia VALUES (6, 3, 'Noticia 6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis congue accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sit amet erat ac libero molestie accumsan. Vestibulum posuere tempor erat, ut semper diam dictum at. Sed nec orci quam. Quisque velit ligula, facilisis nec lacinia in, ultrices sed tellus. Fusce nec nisi sapien, a congue lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis vehicula fermentum ultrices.

Donec gravida euismod pellentesque. Nam elit felis, scelerisque quis elementum eget, auctor et ante. Nunc eget sapien non mi molestie aliquam eu eu ligula. In hac habitasse platea dictumst. Maecenas vehicula, purus vitae aliquet euismod, dui lacus blandit magna, a sollicitudin eros purus at tortor. Curabitur rhoncus auctor egestas. Donec ac ligula ut est consequat suscipit. Aenean cursus mi ac velit placerat ullamcorper. Integer dignissim feugiat risus, at scelerisque ipsum venenatis non. Vestibulum imperdiet sollicitudin neque sit amet imperdiet. Praesent tincidunt neque vel tortor scelerisque nec posuere odio ornare. Duis commodo rutrum nulla et hendrerit. Cras tristique, lectus a iaculis ornare, dui tellus laoreet risus, at pharetra velit sem et nunc.

Vestibulum ornare massa vitae metus elementum fringilla. Duis vestibulum ligula et ipsum luctus faucibus. Proin vel ullamcorper augue. Nunc quis interdum sapien. Nullam scelerisque augue sit amet sem sollicitudin eu facilisis risus porta. Integer vitae mollis magna. In hac habitasse platea dictumst. Cras sed nisl urna. Sed sodales ultrices lacinia. Fusce et nunc vitae velit porttitor posuere eu quis est. Donec libero justo, varius ut rutrum eu, facilisis nec nibh. Vestibulum semper feugiat facilisis. Suspendisse potenti. Morbi molestie ligula sed dui volutpat a luctus purus laoreet. In eget neque mi. Proin ac porta elit

Praesent fermentum eros eget eros ultricies pretium. Proin a nunc odio, eget laoreet metus. Maecenas mattis, dolor et congue hendrerit, diam nibh euismod nibh, ornare sagittis velit nulla quis enim. In non lorem ut nunc volutpat luctus id eu lectus. Curabitur bibendum diam quis nulla ullamcorper eu blandit nisl faucibus. Sed tempus euismod mollis. Praesent elementum interdum ante, non euismod nisi elementum malesuada. Aliquam ac mauris diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'thumb_img_noticia.jpg', '2012-09-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.(manchete)', 13);
INSERT INTO noticia VALUES (7, 1, 'Noticia 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis congue accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sit amet erat ac libero molestie accumsan. Vestibulum posuere tempor erat, ut semper diam dictum at. Sed nec orci quam. Quisque velit ligula, facilisis nec lacinia in, ultrices sed tellus. Fusce nec nisi sapien, a congue lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis vehicula fermentum ultrices.

Donec gravida euismod pellentesque. Nam elit felis, scelerisque quis elementum eget, auctor et ante. Nunc eget sapien non mi molestie aliquam eu eu ligula. In hac habitasse platea dictumst. Maecenas vehicula, purus vitae aliquet euismod, dui lacus blandit magna, a sollicitudin eros purus at tortor. Curabitur rhoncus auctor egestas. Donec ac ligula ut est consequat suscipit. Aenean cursus mi ac velit placerat ullamcorper. Integer dignissim feugiat risus, at scelerisque ipsum venenatis non. Vestibulum imperdiet sollicitudin neque sit amet imperdiet. Praesent tincidunt neque vel tortor scelerisque nec posuere odio ornare. Duis commodo rutrum nulla et hendrerit. Cras tristique, lectus a iaculis ornare, dui tellus laoreet risus, at pharetra velit sem et nunc.

Vestibulum ornare massa vitae metus elementum fringilla. Duis vestibulum ligula et ipsum luctus faucibus. Proin vel ullamcorper augue. Nunc quis interdum sapien. Nullam scelerisque augue sit amet sem sollicitudin eu facilisis risus porta. Integer vitae mollis magna. In hac habitasse platea dictumst. Cras sed nisl urna. Sed sodales ultrices lacinia. Fusce et nunc vitae velit porttitor posuere eu quis est. Donec libero justo, varius ut rutrum eu, facilisis nec nibh. Vestibulum semper feugiat facilisis. Suspendisse potenti. Morbi molestie ligula sed dui volutpat a luctus purus laoreet. In eget neque mi. Proin ac porta elit

Praesent fermentum eros eget eros ultricies pretium. Proin a nunc odio, eget laoreet metus. Maecenas mattis, dolor et congue hendrerit, diam nibh euismod nibh, ornare sagittis velit nulla quis enim. In non lorem ut nunc volutpat luctus id eu lectus. Curabitur bibendum diam quis nulla ullamcorper eu blandit nisl faucibus. Sed tempus euismod mollis. Praesent elementum interdum ante, non euismod nisi elementum malesuada. Aliquam ac mauris diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'thumb_img_noticia.jpg', '2012-09-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.(manchete)', 10);
INSERT INTO noticia VALUES (8, 2, 'Noticia 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis congue accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sit amet erat ac libero molestie accumsan. Vestibulum posuere tempor erat, ut semper diam dictum at. Sed nec orci quam. Quisque velit ligula, facilisis nec lacinia in, ultrices sed tellus. Fusce nec nisi sapien, a congue lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis vehicula fermentum ultrices.

Donec gravida euismod pellentesque. Nam elit felis, scelerisque quis elementum eget, auctor et ante. Nunc eget sapien non mi molestie aliquam eu eu ligula. In hac habitasse platea dictumst. Maecenas vehicula, purus vitae aliquet euismod, dui lacus blandit magna, a sollicitudin eros purus at tortor. Curabitur rhoncus auctor egestas. Donec ac ligula ut est consequat suscipit. Aenean cursus mi ac velit placerat ullamcorper. Integer dignissim feugiat risus, at scelerisque ipsum venenatis non. Vestibulum imperdiet sollicitudin neque sit amet imperdiet. Praesent tincidunt neque vel tortor scelerisque nec posuere odio ornare. Duis commodo rutrum nulla et hendrerit. Cras tristique, lectus a iaculis ornare, dui tellus laoreet risus, at pharetra velit sem et nunc.

Vestibulum ornare massa vitae metus elementum fringilla. Duis vestibulum ligula et ipsum luctus faucibus. Proin vel ullamcorper augue. Nunc quis interdum sapien. Nullam scelerisque augue sit amet sem sollicitudin eu facilisis risus porta. Integer vitae mollis magna. In hac habitasse platea dictumst. Cras sed nisl urna. Sed sodales ultrices lacinia. Fusce et nunc vitae velit porttitor posuere eu quis est. Donec libero justo, varius ut rutrum eu, facilisis nec nibh. Vestibulum semper feugiat facilisis. Suspendisse potenti. Morbi molestie ligula sed dui volutpat a luctus purus laoreet. In eget neque mi. Proin ac porta elit

Praesent fermentum eros eget eros ultricies pretium. Proin a nunc odio, eget laoreet metus. Maecenas mattis, dolor et congue hendrerit, diam nibh euismod nibh, ornare sagittis velit nulla quis enim. In non lorem ut nunc volutpat luctus id eu lectus. Curabitur bibendum diam quis nulla ullamcorper eu blandit nisl faucibus. Sed tempus euismod mollis. Praesent elementum interdum ante, non euismod nisi elementum malesuada. Aliquam ac mauris diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'thumb_img_noticia.jpg', '2012-09-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.(manchete)', 5);
INSERT INTO noticia VALUES (2, 2, 'Newpoint felicita seus funcionários pelos anos de trabalho', '<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis congue accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sit amet erat ac libero molestie accumsan. Vestibulum posuere tempor erat, ut semper diam dictum at. Sed nec orci quam. Quisque velit ligula, facilisis nec lacinia in, ultrices sed tellus. Fusce nec nisi sapien, a congue lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis vehicula fermentum ultrices.
  		</p>
  		<p>
Donec gravida euismod pellentesque. Nam elit felis, scelerisque quis elementum eget, auctor et ante. Nunc eget sapien non mi molestie aliquam eu eu ligula. In hac habitasse platea dictumst. Maecenas vehicula, purus vitae aliquet euismod, dui lacus blandit magna, a sollicitudin eros purus at tortor. Curabitur rhoncus auctor egestas. Donec ac ligula ut est consequat suscipit. Aenean cursus mi ac velit placerat ullamcorper. Integer dignissim feugiat risus, at scelerisque ipsum venenatis non. Vestibulum imperdiet sollicitudin neque sit amet imperdiet. Praesent tincidunt neque vel tortor scelerisque nec posuere odio ornare. Duis commodo rutrum nulla et hendrerit. Cras tristique, lectus a iaculis ornare, dui tellus laoreet risus, at pharetra velit sem et nunc.
  		</p>
  		<p>
Vestibulum ornare massa vitae metus elementum fringilla. Duis vestibulum ligula et ipsum luctus faucibus. Proin vel ullamcorper augue. Nunc quis interdum sapien. Nullam scelerisque augue sit amet sem sollicitudin eu facilisis risus porta. Integer vitae mollis magna. In hac habitasse platea dictumst. Cras sed nisl urna. Sed sodales ultrices lacinia. Fusce et nunc vitae velit porttitor posuere eu quis est. Donec libero justo, varius ut rutrum eu, facilisis nec nibh. Vestibulum semper feugiat facilisis. Suspendisse potenti. Morbi molestie ligula sed dui volutpat a luctus purus laoreet. In eget neque mi. Proin ac porta elit
  		</p>
  		<p>
Praesent fermentum eros eget eros ultricies pretium. Proin a nunc odio, eget laoreet metus. Maecenas mattis, dolor et congue hendrerit, diam nibh euismod nibh, ornare sagittis velit nulla quis enim. In non lorem ut nunc volutpat luctus id eu lectus. Curabitur bibendum diam quis nulla ullamcorper eu blandit nisl faucibus. Sed tempus euismod mollis. Praesent elementum interdum ante, non euismod nisi elementum malesuada. Aliquam ac mauris diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
  		</p>', 'thumb_img_noticia.jpg', '2012-09-09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.(manchete)', 16);
INSERT INTO noticia VALUES (1, 2, 'Newpoint comemora os 100 anos de cursos', '<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis congue accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sit amet erat ac libero molestie accumsan. Vestibulum posuere tempor erat, ut semper diam dictum at. Sed nec orci quam. Quisque velit ligula, facilisis nec lacinia in, ultrices sed tellus. Fusce nec nisi sapien, a congue lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis vehicula fermentum ultrices.
  		</p>
  		<p>
Donec gravida euismod pellentesque. Nam elit felis, scelerisque quis elementum eget, auctor et ante. Nunc eget sapien non mi molestie aliquam eu eu ligula. In hac habitasse platea dictumst. Maecenas vehicula, purus vitae aliquet euismod, dui lacus blandit magna, a sollicitudin eros purus at tortor. Curabitur rhoncus auctor egestas. Donec ac ligula ut est consequat suscipit. Aenean cursus mi ac velit placerat ullamcorper. Integer dignissim feugiat risus, at scelerisque ipsum venenatis non. Vestibulum imperdiet sollicitudin neque sit amet imperdiet. Praesent tincidunt neque vel tortor scelerisque nec posuere odio ornare. Duis commodo rutrum nulla et hendrerit. Cras tristique, lectus a iaculis ornare, dui tellus laoreet risus, at pharetra velit sem et nunc.
  		</p>
  		<p>
Vestibulum ornare massa vitae metus elementum fringilla. Duis vestibulum ligula et ipsum luctus faucibus. Proin vel ullamcorper augue. Nunc quis interdum sapien. Nullam scelerisque augue sit amet sem sollicitudin eu facilisis risus porta. Integer vitae mollis magna. In hac habitasse platea dictumst. Cras sed nisl urna. Sed sodales ultrices lacinia. Fusce et nunc vitae velit porttitor posuere eu quis est. Donec libero justo, varius ut rutrum eu, facilisis nec nibh. Vestibulum semper feugiat facilisis. Suspendisse potenti. Morbi molestie ligula sed dui volutpat a luctus purus laoreet. In eget neque mi. Proin ac porta elit
  		</p>
  		<p>
Praesent fermentum eros eget eros ultricies pretium. Proin a nunc odio, eget laoreet metus. Maecenas mattis, dolor et congue hendrerit, diam nibh euismod nibh, ornare sagittis velit nulla quis enim. In non lorem ut nunc volutpat luctus id eu lectus. Curabitur bibendum diam quis nulla ullamcorper eu blandit nisl faucibus. Sed tempus euismod mollis. Praesent elementum interdum ante, non euismod nisi elementum malesuada. Aliquam ac mauris diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
  		</p>', 'thumb_img_noticia.jpg', '2012-09-09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.(manchete)', 23);
INSERT INTO noticia VALUES (3, 2, 'Newpoint teste', '<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin convallis congue accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sit amet erat ac libero molestie accumsan. Vestibulum posuere tempor erat, ut semper diam dictum at. Sed nec orci quam. Quisque velit ligula, facilisis nec lacinia in, ultrices sed tellus. Fusce nec nisi sapien, a congue lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis vehicula fermentum ultrices.
  		</p>
  		<p>
Donec gravida euismod pellentesque. Nam elit felis, scelerisque quis elementum eget, auctor et ante. Nunc eget sapien non mi molestie aliquam eu eu ligula. In hac habitasse platea dictumst. Maecenas vehicula, purus vitae aliquet euismod, dui lacus blandit magna, a sollicitudin eros purus at tortor. Curabitur rhoncus auctor egestas. Donec ac ligula ut est consequat suscipit. Aenean cursus mi ac velit placerat ullamcorper. Integer dignissim feugiat risus, at scelerisque ipsum venenatis non. Vestibulum imperdiet sollicitudin neque sit amet imperdiet. Praesent tincidunt neque vel tortor scelerisque nec posuere odio ornare. Duis commodo rutrum nulla et hendrerit. Cras tristique, lectus a iaculis ornare, dui tellus laoreet risus, at pharetra velit sem et nunc.
  		</p>
  		<p>
Vestibulum ornare massa vitae metus elementum fringilla. Duis vestibulum ligula et ipsum luctus faucibus. Proin vel ullamcorper augue. Nunc quis interdum sapien. Nullam scelerisque augue sit amet sem sollicitudin eu facilisis risus porta. Integer vitae mollis magna. In hac habitasse platea dictumst. Cras sed nisl urna. Sed sodales ultrices lacinia. Fusce et nunc vitae velit porttitor posuere eu quis est. Donec libero justo, varius ut rutrum eu, facilisis nec nibh. Vestibulum semper feugiat facilisis. Suspendisse potenti. Morbi molestie ligula sed dui volutpat a luctus purus laoreet. In eget neque mi. Proin ac porta elit
  		</p>
  		<p>
Praesent fermentum eros eget eros ultricies pretium. Proin a nunc odio, eget laoreet metus. Maecenas mattis, dolor et congue hendrerit, diam nibh euismod nibh, ornare sagittis velit nulla quis enim. In non lorem ut nunc volutpat luctus id eu lectus. Curabitur bibendum diam quis nulla ullamcorper eu blandit nisl faucibus. Sed tempus euismod mollis. Praesent elementum interdum ante, non euismod nisi elementum malesuada. Aliquam ac mauris diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
  		</p>', 'thumb_img_noticia.jpg', '2012-09-09', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.(manchete)', 3);


--
-- Data for Name: perfis; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: sac; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: tipovaga; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: turno; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: unidades; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Data for Name: vagas; Type: TABLE DATA; Schema: public; Owner: escolasnewpoint
--



--
-- Name: pk_id_agenda; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY agenda
    ADD CONSTRAINT pk_id_agenda PRIMARY KEY (id);


--
-- Name: pk_id_album; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY album
    ADD CONSTRAINT pk_id_album PRIMARY KEY (id);


--
-- Name: pk_id_alternativa; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY nivelamentoalternativas
    ADD CONSTRAINT pk_id_alternativa PRIMARY KEY (id);


--
-- Name: pk_id_area_do_aluno_jogos; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY areadoalunojogos
    ADD CONSTRAINT pk_id_area_do_aluno_jogos PRIMARY KEY (id);


--
-- Name: pk_id_aula_demonstrativa; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY aulademonstrativa
    ADD CONSTRAINT pk_id_aula_demonstrativa PRIMARY KEY (id);


--
-- Name: pk_id_banners; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY banners
    ADD CONSTRAINT pk_id_banners PRIMARY KEY (id);


--
-- Name: pk_id_candidato_nivelamento_candidatos; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY nivelamentocandidatos
    ADD CONSTRAINT pk_id_candidato_nivelamento_candidatos PRIMARY KEY (id);


--
-- Name: pk_id_cargo_cargos; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY cargos
    ADD CONSTRAINT pk_id_cargo_cargos PRIMARY KEY (id);


--
-- Name: pk_id_categoria_agendamento; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY categoriaagendamento
    ADD CONSTRAINT pk_id_categoria_agendamento PRIMARY KEY (id);


--
-- Name: pk_id_categoria_categoria_noticias; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY categorianoticia
    ADD CONSTRAINT pk_id_categoria_categoria_noticias PRIMARY KEY (id);


--
-- Name: pk_id_cidade; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY cidades
    ADD CONSTRAINT pk_id_cidade PRIMARY KEY (id);


--
-- Name: pk_id_curriculo_has_vagas; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY curriculos_has_vagas
    ADD CONSTRAINT pk_id_curriculo_has_vagas PRIMARY KEY (id);


--
-- Name: pk_id_curriculos; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY curriculos
    ADD CONSTRAINT pk_id_curriculos PRIMARY KEY (id);


--
-- Name: pk_id_curso; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT pk_id_curso PRIMARY KEY (id);


--
-- Name: pk_id_cursos_has_modulos; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY cursos_has_modulos
    ADD CONSTRAINT pk_id_cursos_has_modulos PRIMARY KEY (id);


--
-- Name: pk_id_empresa_convenio; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY empresaconvenio
    ADD CONSTRAINT pk_id_empresa_convenio PRIMARY KEY (id);


--
-- Name: pk_id_estados; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY estados
    ADD CONSTRAINT pk_id_estados PRIMARY KEY (id);


--
-- Name: pk_id_imagem; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY galeriafotos
    ADD CONSTRAINT pk_id_imagem PRIMARY KEY (id);


--
-- Name: pk_id_instituicao; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY instituicao
    ADD CONSTRAINT pk_id_instituicao PRIMARY KEY (id);


--
-- Name: pk_id_materiais_arquivos; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY materiaisarquivos
    ADD CONSTRAINT pk_id_materiais_arquivos PRIMARY KEY (id);


--
-- Name: pk_id_material; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY materiais
    ADD CONSTRAINT pk_id_material PRIMARY KEY (id);


--
-- Name: pk_id_modulos; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY modulos
    ADD CONSTRAINT pk_id_modulos PRIMARY KEY (id);


--
-- Name: pk_id_nivelamento_respostas; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY nivelamentorespostas
    ADD CONSTRAINT pk_id_nivelamento_respostas PRIMARY KEY (id);


--
-- Name: pk_id_nota_nivelamento_notas; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY nivelamentonotas
    ADD CONSTRAINT pk_id_nota_nivelamento_notas PRIMARY KEY (id);


--
-- Name: pk_id_noticia; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY noticia
    ADD CONSTRAINT pk_id_noticia PRIMARY KEY (id);


--
-- Name: pk_id_perfil; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY perfis
    ADD CONSTRAINT pk_id_perfil PRIMARY KEY (id);


--
-- Name: pk_id_questao; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY nivelamentoquestoes
    ADD CONSTRAINT pk_id_questao PRIMARY KEY (id);


--
-- Name: pk_id_sac; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY sac
    ADD CONSTRAINT pk_id_sac PRIMARY KEY (id);


--
-- Name: pk_id_tipo_tipovagas; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY tipovaga
    ADD CONSTRAINT pk_id_tipo_tipovagas PRIMARY KEY (id);


--
-- Name: pk_id_turno; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY turno
    ADD CONSTRAINT pk_id_turno PRIMARY KEY (id);


--
-- Name: pk_id_unidades; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY unidades
    ADD CONSTRAINT pk_id_unidades PRIMARY KEY (id);


--
-- Name: pk_id_usuario; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT pk_id_usuario PRIMARY KEY (id);


--
-- Name: pk_id_vaga_vagas; Type: CONSTRAINT; Schema: public; Owner: escolasnewpoint; Tablespace: 
--

ALTER TABLE ONLY vagas
    ADD CONSTRAINT pk_id_vaga_vagas PRIMARY KEY (id);


--
-- Name: fk_id_album_galeria_fotos; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY galeriafotos
    ADD CONSTRAINT fk_id_album_galeria_fotos FOREIGN KEY (idalbum) REFERENCES album(id);


--
-- Name: fk_id_alternativa_nivelamento_respostas; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY nivelamentorespostas
    ADD CONSTRAINT fk_id_alternativa_nivelamento_respostas FOREIGN KEY (idalternativa) REFERENCES nivelamentoalternativas(id);


--
-- Name: fk_id_candidato_nivelamento_notas; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY nivelamentonotas
    ADD CONSTRAINT fk_id_candidato_nivelamento_notas FOREIGN KEY (idcandidato) REFERENCES nivelamentocandidatos(id);


--
-- Name: fk_id_cargo_vagas; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY vagas
    ADD CONSTRAINT fk_id_cargo_vagas FOREIGN KEY (idcargo) REFERENCES cargos(id);


--
-- Name: fk_id_categoria_agenda; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY agenda
    ADD CONSTRAINT fk_id_categoria_agenda FOREIGN KEY (idcategoria) REFERENCES categoriaagendamento(id);


--
-- Name: fk_id_categoria_noticias; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY noticia
    ADD CONSTRAINT fk_id_categoria_noticias FOREIGN KEY (idcategoria) REFERENCES categorianoticia(id);


--
-- Name: fk_id_cidade_aula_demonstrativa; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY aulademonstrativa
    ADD CONSTRAINT fk_id_cidade_aula_demonstrativa FOREIGN KEY (idcidade) REFERENCES cidades(id);


--
-- Name: fk_id_cidade_empresa_convenio; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY empresaconvenio
    ADD CONSTRAINT fk_id_cidade_empresa_convenio FOREIGN KEY (idcidade) REFERENCES cidades(id);


--
-- Name: fk_id_cidade_unidades; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY unidades
    ADD CONSTRAINT fk_id_cidade_unidades FOREIGN KEY (idcidade) REFERENCES cidades(id);


--
-- Name: fk_id_cidade_vagas; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY vagas
    ADD CONSTRAINT fk_id_cidade_vagas FOREIGN KEY (idcidade) REFERENCES cidades(id);


--
-- Name: fk_id_curriculo_curriculo_has_vagas; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY curriculos_has_vagas
    ADD CONSTRAINT fk_id_curriculo_curriculo_has_vagas FOREIGN KEY (idcurriculo) REFERENCES curriculos(id);


--
-- Name: fk_id_estado_cidades; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY cidades
    ADD CONSTRAINT fk_id_estado_cidades FOREIGN KEY (idestado) REFERENCES estados(id);


--
-- Name: fk_id_material_materiais_arquivos; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY materiaisarquivos
    ADD CONSTRAINT fk_id_material_materiais_arquivos FOREIGN KEY (idmaterial) REFERENCES materiais(id);


--
-- Name: fk_id_modulo_cursos_has_modulos; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY cursos_has_modulos
    ADD CONSTRAINT fk_id_modulo_cursos_has_modulos FOREIGN KEY (idmodulo) REFERENCES modulos(id);


--
-- Name: fk_id_perfil_usuarios; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT fk_id_perfil_usuarios FOREIGN KEY (idperfil) REFERENCES perfis(id);


--
-- Name: fk_id_questao_nivelamento_alternativas; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY nivelamentoalternativas
    ADD CONSTRAINT fk_id_questao_nivelamento_alternativas FOREIGN KEY (idquestao) REFERENCES nivelamentoquestoes(id);


--
-- Name: fk_id_questao_nivelamento_respostas; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY nivelamentorespostas
    ADD CONSTRAINT fk_id_questao_nivelamento_respostas FOREIGN KEY (idquestao) REFERENCES nivelamentoquestoes(id);


--
-- Name: fk_id_tipo_vagas; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY vagas
    ADD CONSTRAINT fk_id_tipo_vagas FOREIGN KEY (idtipo) REFERENCES tipovaga(id);


--
-- Name: fk_id_turno_vagas; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY vagas
    ADD CONSTRAINT fk_id_turno_vagas FOREIGN KEY (idturno) REFERENCES turno(id);


--
-- Name: fk_id_unidade_album; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY album
    ADD CONSTRAINT fk_id_unidade_album FOREIGN KEY (idunidade) REFERENCES unidades(id);


--
-- Name: fk_id_unidade_sac; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY sac
    ADD CONSTRAINT fk_id_unidade_sac FOREIGN KEY (idunidade) REFERENCES unidades(id);


--
-- Name: fk_id_unidade_usuarios; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT fk_id_unidade_usuarios FOREIGN KEY (idunidade) REFERENCES unidades(id);


--
-- Name: fk_id_vaga_curriculo_has_vagas; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY curriculos_has_vagas
    ADD CONSTRAINT fk_id_vaga_curriculo_has_vagas FOREIGN KEY (idvaga) REFERENCES vagas(id);


--
-- Name: fk_idcurso_materiais; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY materiais
    ADD CONSTRAINT fk_idcurso_materiais FOREIGN KEY (idcurso) REFERENCES cursos(id);


--
-- Name: fk_idcursos_cursos_has_modulos; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY cursos_has_modulos
    ADD CONSTRAINT fk_idcursos_cursos_has_modulos FOREIGN KEY (idcurso) REFERENCES cursos(id);


--
-- Name: fk_idprofessor_materiais; Type: FK CONSTRAINT; Schema: public; Owner: escolasnewpoint
--

ALTER TABLE ONLY materiais
    ADD CONSTRAINT fk_idprofessor_materiais FOREIGN KEY (idprofessor) REFERENCES usuario(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: escolasnewpoint
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM escolasnewpoint;
GRANT ALL ON SCHEMA public TO escolasnewpoint;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

