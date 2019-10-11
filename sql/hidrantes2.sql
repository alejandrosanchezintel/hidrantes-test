PGDMP                     	    w            sistema_hidrantes    11.3    11.3 P    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            �           1262    18451    sistema_hidrantes    DATABASE     �   CREATE DATABASE sistema_hidrantes WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_United States.1252' LC_CTYPE = 'English_United States.1252';
 !   DROP DATABASE sistema_hidrantes;
             postgres    false            �           0    0    sistema_hidrantes    DATABASE PROPERTIES     S   ALTER DATABASE sistema_hidrantes SET search_path TO '$user', 'public', 'topology';
                  postgres    false    4489            	            2615    20100    topology    SCHEMA        CREATE SCHEMA topology;
    DROP SCHEMA topology;
             postgres    false            �           0    0    SCHEMA topology    COMMENT     9   COMMENT ON SCHEMA topology IS 'PostGIS Topology schema';
                  postgres    false    9                        3079    18513    postgis 	   EXTENSION     ;   CREATE EXTENSION IF NOT EXISTS postgis WITH SCHEMA public;
    DROP EXTENSION postgis;
                  false            �           0    0    EXTENSION postgis    COMMENT     g   COMMENT ON EXTENSION postgis IS 'PostGIS geometry, geography, and raster spatial types and functions';
                       false    2                        3079    20101    postgis_topology 	   EXTENSION     F   CREATE EXTENSION IF NOT EXISTS postgis_topology WITH SCHEMA topology;
 !   DROP EXTENSION postgis_topology;
                  false    2    9            �           0    0    EXTENSION postgis_topology    COMMENT     Y   COMMENT ON EXTENSION postgis_topology IS 'PostGIS topology spatial types and functions';
                       false    3                       1255    20297 D   hidrantes_crear(integer, integer, integer, integer, public.geometry)    FUNCTION     5  CREATE FUNCTION public.hidrantes_crear(in_id integer, in_calle integer, avenida integer, in_caudal integer, in_geom public.geometry) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  INSERT INTO hidrantes(id, calle, avenida, caudal, geom)
  VALUES(in_id, in_calle, in_avenida, in_caudal, in_geom);
END;
$$;
 �   DROP FUNCTION public.hidrantes_crear(in_id integer, in_calle integer, avenida integer, in_caudal integer, in_geom public.geometry);
       public       postgres    false    2    2    2    2    2    2    2    2                        1255    20401 N   hidrantes_crear(character varying, integer, integer, integer, public.geometry)    FUNCTION     K  CREATE FUNCTION public.hidrantes_crear(in_nombre character varying, in_calle integer, avenida integer, in_caudal integer, in_geom public.geometry) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  INSERT INTO hidrantes(nombre, calle, avenida, caudal, geom)
  VALUES(in_nombre, in_calle, in_avenida, in_caudal, in_geom);
END;
$$;
 �   DROP FUNCTION public.hidrantes_crear(in_nombre character varying, in_calle integer, avenida integer, in_caudal integer, in_geom public.geometry);
       public       postgres    false    2    2    2    2    2    2    2    2                       1255    20298    hidrantes_eliminar(integer)    FUNCTION     �   CREATE FUNCTION public.hidrantes_eliminar(in_id integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  DELETE FROM hidrantes WHERE id = in_id;
END;
$$;
 8   DROP FUNCTION public.hidrantes_eliminar(in_id integer);
       public       postgres    false            !           1255    20402 [   hidrantes_modificar(integer, character varying, integer, integer, integer, public.geometry)    FUNCTION     p  CREATE FUNCTION public.hidrantes_modificar(in_id integer, in_nombre character varying, in_calle integer, in_avenida integer, in_caudal integer, in_geom public.geometry) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  UPDATE hidrantes
  SET nombre = in_nombre, calle = in_calle, avenida = in_avenida, caudal = in_caudal, geom = in_geom
  WHERE id = in_id;
END;
$$;
 �   DROP FUNCTION public.hidrantes_modificar(in_id integer, in_nombre character varying, in_calle integer, in_avenida integer, in_caudal integer, in_geom public.geometry);
       public       postgres    false    2    2    2    2    2    2    2    2            "           1255    20403 u   hidrantes_modificar_latlon(integer, character varying, integer, integer, integer, double precision, double precision)    FUNCTION     �  CREATE FUNCTION public.hidrantes_modificar_latlon(in_id integer, in_nombre character varying, in_calle integer, in_avenida integer, in_caudal integer, in_latitud double precision, in_longitud double precision) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  UPDATE hidrantes
  SET nombre = in_nombre, calle = in_calle, avenida = in_avenida, caudal = in_caudal, geom = ST_SetSRID(ST_MakePoint(in_latitud, in_longitud), 4326)
  WHERE id = in_id;
END;
$$;
 �   DROP FUNCTION public.hidrantes_modificar_latlon(in_id integer, in_nombre character varying, in_calle integer, in_avenida integer, in_caudal integer, in_latitud double precision, in_longitud double precision);
       public       postgres    false                       1255    20378    hidrantes_obtener()    FUNCTION     6  CREATE FUNCTION public.hidrantes_obtener() RETURNS TABLE(id integer, nombre character varying, calle integer, avenida integer, caudal integer, geom public.geometry)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY 
  SELECT h.id, h.nombre, h.calle, h.avenida, h.caudal, h.geom 
  FROM hidrantes h;
END;
$$;
 *   DROP FUNCTION public.hidrantes_obtener();
       public       postgres    false    2    2    2    2    2    2    2    2                       1255    20380    hidrantes_obtener_id(integer)    FUNCTION     Z  CREATE FUNCTION public.hidrantes_obtener_id(in_id integer) RETURNS TABLE(id integer, nombre character varying, calle integer, avenida integer, caudal integer, geom public.geometry)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY
  SELECT h.id, h.nombre, h.calle, h.avenida, h.caudal, h.geom 
  FROM hidrantes h
  WHERE h.id = in_id;
END;
$$;
 :   DROP FUNCTION public.hidrantes_obtener_id(in_id integer);
       public       postgres    false    2    2    2    2    2    2    2    2                       1255    20419 !   hidrantes_obtener_nombre(integer)    FUNCTION     j  CREATE FUNCTION public.hidrantes_obtener_nombre(in_nombre integer) RETURNS TABLE(id integer, nombre character varying, calle integer, avenida integer, caudal integer, geom public.geometry)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY
  SELECT h.id, h.nombre, h.calle, h.avenida, h.caudal, h.geom 
  FROM hidrantes h
  WHERE h.nombre = in_nombre;
END;
$$;
 B   DROP FUNCTION public.hidrantes_obtener_nombre(in_nombre integer);
       public       postgres    false    2    2    2    2    2    2    2    2            &           1255    20420 +   hidrantes_obtener_nombre(character varying)    FUNCTION     t  CREATE FUNCTION public.hidrantes_obtener_nombre(in_nombre character varying) RETURNS TABLE(id integer, nombre character varying, calle integer, avenida integer, caudal integer, geom public.geometry)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY
  SELECT h.id, h.nombre, h.calle, h.avenida, h.caudal, h.geom 
  FROM hidrantes h
  WHERE h.nombre = in_nombre;
END;
$$;
 L   DROP FUNCTION public.hidrantes_obtener_nombre(in_nombre character varying);
       public       postgres    false    2    2    2    2    2    2    2    2                       1255    20330 $   inspecciones_crear(integer, integer)    FUNCTION     �   CREATE FUNCTION public.inspecciones_crear(in_bombero integer, in_hidrante integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  INSERT INTO inspecciones(bombero, hidrante, fecha_solicitud)
  VALUES(in_bombero, in_hidrante, current_date);
END;
$$;
 R   DROP FUNCTION public.inspecciones_crear(in_bombero integer, in_hidrante integer);
       public       postgres    false                       1255    20408 O   inspecciones_crear_latlon(integer, integer, double precision, double precision)    FUNCTION     �  CREATE FUNCTION public.inspecciones_crear_latlon(in_bombero integer, in_hidrante_nuevo integer, in_latitud double precision, in_longitud double precision) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  INSERT INTO inspecciones(bombero, hidrante_nuevo, fecha_solicitud, geom)
  VALUES(in_bombero, in_hidrante_nuevo, current_date, geom = ST_SetSRID(ST_MakePoint(in_latitud, in_longitud), 4326));
END;
$$;
 �   DROP FUNCTION public.inspecciones_crear_latlon(in_bombero integer, in_hidrante_nuevo integer, in_latitud double precision, in_longitud double precision);
       public       postgres    false            $           1255    20409 Y   inspecciones_crear_latlon(integer, character varying, double precision, double precision)    FUNCTION     �  CREATE FUNCTION public.inspecciones_crear_latlon(in_bombero integer, in_hidrante_nuevo character varying, in_latitud double precision, in_longitud double precision) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  INSERT INTO inspecciones(bombero, hidrante, hidrante_nuevo, fecha_solicitud, geom)
  VALUES(in_bombero, 0, in_hidrante_nuevo, current_date, ST_SetSRID(ST_MakePoint(in_latitud, in_longitud), 4326));
END;
$$;
 �   DROP FUNCTION public.inspecciones_crear_latlon(in_bombero integer, in_hidrante_nuevo character varying, in_latitud double precision, in_longitud double precision);
       public       postgres    false                       1255    20331    inspecciones_eliminar(integer)    FUNCTION     �   CREATE FUNCTION public.inspecciones_eliminar(in_id integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  DELETE FROM inspecciones WHERE id = in_id;
END;
$$;
 ;   DROP FUNCTION public.inspecciones_eliminar(in_id integer);
       public       postgres    false                       1255    20387 :   inspecciones_modificar(integer, integer, integer, integer)    FUNCTION     �  CREATE FUNCTION public.inspecciones_modificar(in_id integer, in_bombero integer, in_hidrante integer, in_accion integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
IF in_accion > 0 THEN
  UPDATE inspecciones
  SET bombero = in_bombero, hidrante = in_hidrante, accion = in_accion, completo = true, fecha_finalizacion = current_date 
  WHERE id = in_id;
ELSE
  UPDATE inspecciones
  SET bombero = in_bombero, hidrante = in_hidrante
  WHERE id = in_id;
END IF;
END;
$$;
 x   DROP FUNCTION public.inspecciones_modificar(in_id integer, in_bombero integer, in_hidrante integer, in_accion integer);
       public       postgres    false                       1255    20412    inspecciones_obtener()    FUNCTION     �  CREATE FUNCTION public.inspecciones_obtener() RETURNS TABLE(id integer, bombero integer, hidrante integer, completo boolean, accion integer, fecha_solicitud date, fecha_finalizacion date, hidrante_nuevo character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY 
  SELECT i.id, i.bombero, i.hidrante, i.completo, i.accion, i.fecha_solicitud, i.fecha_finalizacion, i.hidrante_nuevo 
  FROM inspecciones i
  ORDER BY id desc;
END;
$$;
 -   DROP FUNCTION public.inspecciones_obtener();
       public       postgres    false            #           1255    20413     inspecciones_obtener_id(integer)    FUNCTION     �  CREATE FUNCTION public.inspecciones_obtener_id(in_id integer) RETURNS TABLE(id integer, bombero integer, hidrante integer, completo boolean, accion integer, fecha_solicitud date, fecha_finalizacion date, hidrante_nuevo character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY
  SELECT i.id, i.bombero, i.hidrante, i.completo, i.accion, i.fecha_solicitud, i.fecha_finalizacion, i.hidrante_nuevo 
  FROM inspecciones i
  WHERE i.id = in_id;
END;
$$;
 =   DROP FUNCTION public.inspecciones_obtener_id(in_id integer);
       public       postgres    false                       1255    20388    inspecciones_trigger_funcion()    FUNCTION       CREATE FUNCTION public.inspecciones_trigger_funcion() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
  IF new.accion > 0 THEN
    INSERT INTO solicitudes(inspeccion, fecha_solicitud)
    VALUES(new.id, current_date);
	RETURN NEW;
  END IF;
  RETURN NEW;
END;
$$;
 5   DROP FUNCTION public.inspecciones_trigger_funcion();
       public       postgres    false                       1255    20382    inspeccionesid(integer)    FUNCTION     �  CREATE FUNCTION public.inspeccionesid(in_id integer) RETURNS TABLE(id integer, bombero integer, hidrante integer, completo boolean, accion integer, fecha_solicitud date, fecha_finalizacion date)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY
  SELECT i.id, i.bombero, i.hidrante, i.completo, i.accion, i.fecha_solicitud, i.fecha_finalizacion 
  FROM inspecciones i
  WHERE i.id = in_id;
END;
$$;
 4   DROP FUNCTION public.inspeccionesid(in_id integer);
       public       postgres    false                       1255    20394 #   solicitudes_crear(integer, integer)    FUNCTION     �   CREATE FUNCTION public.solicitudes_crear(in_inspeccion integer, in_estado integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  INSERT INTO solicitudes(inspeccion, estado, fecha_solicitud)
  VALUES(in_inspeccion, in_estado, current_date);
END;
$$;
 R   DROP FUNCTION public.solicitudes_crear(in_inspeccion integer, in_estado integer);
       public       postgres    false                       1255    20395    solicitudes_eliminar(integer)    FUNCTION     �   CREATE FUNCTION public.solicitudes_eliminar(in_id integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  DELETE FROM solicitudes WHERE id = in_id;
END;
$$;
 :   DROP FUNCTION public.solicitudes_eliminar(in_id integer);
       public       postgres    false                       1255    20400 '   solicitudes_modificar(integer, integer)    FUNCTION       CREATE FUNCTION public.solicitudes_modificar(in_id integer, in_estado integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  IF in_estado > 0 THEN
    UPDATE solicitudes
    SET estado = in_estado, fecha_finalizacion = current_date
    WHERE id = in_id;
  END IF;
END;
$$;
 N   DROP FUNCTION public.solicitudes_modificar(in_id integer, in_estado integer);
       public       postgres    false                       1255    20397 0   solicitudes_modificar(integer, integer, integer)    FUNCTION     �   CREATE FUNCTION public.solicitudes_modificar(in_id integer, in_inspeccion integer, in_estado integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  UPDATE solicitudes
  SET inspeccion = in_inspeccion, estado = in_estado
  WHERE id = in_id;
END;
$$;
 e   DROP FUNCTION public.solicitudes_modificar(in_id integer, in_inspeccion integer, in_estado integer);
       public       postgres    false            %           1255    20390    solicitudes_obtener()    FUNCTION     �   CREATE FUNCTION public.solicitudes_obtener() RETURNS TABLE(id integer, inspeccion integer, estado integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY 
  SELECT s.id, s.inspeccion, s.estado 
  FROM solicitudes s
  ORDER BY id DESC;
END;
$$;
 ,   DROP FUNCTION public.solicitudes_obtener();
       public       postgres    false                       1255    20399    solicitudes_obtener_id(integer)    FUNCTION     a  CREATE FUNCTION public.solicitudes_obtener_id(in_id integer) RETURNS TABLE(id integer, inspeccion integer, estado integer, fecha_solicitud date, fecha_finalizacion date)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY
  SELECT s.id, s.inspeccion, s.estado, s.fecha_solicitud, s.fecha_finalizacion
  FROM solicitudes s
  WHERE s.id = in_id;
END;
$$;
 <   DROP FUNCTION public.solicitudes_obtener_id(in_id integer);
       public       postgres    false                       1255    20414    solicitudes_trigger_funcion()    FUNCTION     h  CREATE FUNCTION public.solicitudes_trigger_funcion() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
DECLARE 
geomvar public.geometry(Point,4326);
hnombrevar varchar(30);
accionvar int;
BEGIN
  IF new.estado > 0 THEN

    SELECT accion from inspecciones where id = new.inspeccion into accionvar;

    IF accionvar = 1 THEN

    SELECT geom from inspecciones where id = new.inspeccion into geomvar;
    SELECT hidrante_nuevo from inspecciones where id = new.inspeccion into hnombrevar;

    INSERT INTO hidrantes(nombre, geom)
    VALUES(hnombrevar, geomvar);
    END IF;
	RETURN NEW;
  END IF;
  RETURN NEW;
END;
$$;
 4   DROP FUNCTION public.solicitudes_trigger_funcion();
       public       postgres    false                       1255    20285 a   usuario_crear(integer, character varying, character varying, character varying, integer, integer)    FUNCTION     �  CREATE FUNCTION public.usuario_crear(in_cedula integer, in_nombre character varying, in_apellido_1 character varying, in_apellido_2 character varying, in_telefono integer, in_tipo integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  INSERT INTO usuarios(cedula, nombre, apellido_1, apellido_2, telefono, tipo)
  VALUES(in_cedula, in_nombre, in_apellido_1, in_apellido_2, in_telefono, in_tipo);
END;
$$;
 �   DROP FUNCTION public.usuario_crear(in_cedula integer, in_nombre character varying, in_apellido_1 character varying, in_apellido_2 character varying, in_telefono integer, in_tipo integer);
       public       postgres    false                       1255    20287    usuario_eliminar(integer)    FUNCTION     �   CREATE FUNCTION public.usuario_eliminar(in_cedula integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  DELETE FROM usuarios WHERE cedula = in_cedula;
END;
$$;
 :   DROP FUNCTION public.usuario_eliminar(in_cedula integer);
       public       postgres    false                       1255    20301 F   usuario_modificar(integer, integer, integer, integer, public.geometry)    FUNCTION     =  CREATE FUNCTION public.usuario_modificar(in_id integer, in_calle integer, in_avenida integer, in_caudal integer, in_geom public.geometry) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  UPDATE hidrantes
  SET calle = in_calle, avenida = in_avenida, caudal = in_caudal, geom = in_geom
  WHERE id = in_id;
END;
$$;
 �   DROP FUNCTION public.usuario_modificar(in_id integer, in_calle integer, in_avenida integer, in_caudal integer, in_geom public.geometry);
       public       postgres    false    2    2    2    2    2    2    2    2            
           1255    20296 e   usuario_modificar(integer, character varying, character varying, character varying, integer, integer)    FUNCTION     �  CREATE FUNCTION public.usuario_modificar(in_cedula integer, in_nombre character varying, in_apellido_1 character varying, in_apellido_2 character varying, in_telefono integer, in_tipo integer) RETURNS void
    LANGUAGE plpgsql
    AS $$
BEGIN
  UPDATE usuarios
  SET nombre = in_nombre, apellido_1 = in_apellido_1, apellido_2 = in_apellido_2, telefono = in_telefono, tipo = in_tipo
  WHERE cedula = in_cedula;
END;
$$;
 �   DROP FUNCTION public.usuario_modificar(in_cedula integer, in_nombre character varying, in_apellido_1 character varying, in_apellido_2 character varying, in_telefono integer, in_tipo integer);
       public       postgres    false                       1255    20293    usuario_obtener()    FUNCTION     [  CREATE FUNCTION public.usuario_obtener() RETURNS TABLE(cedula integer, nombre character varying, apellido_1 character varying, apellido_2 character varying, telefono integer, tipo integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY 
  SELECT u.cedula, u.nombre, u.apellido_1, u.apellido_2, u.telefono, u.tipo 
  FROM usuarios u;
END;
$$;
 (   DROP FUNCTION public.usuario_obtener();
       public       postgres    false            	           1255    20295    usuario_obtener_cedula(integer)    FUNCTION     �  CREATE FUNCTION public.usuario_obtener_cedula(in_cedula integer) RETURNS TABLE(cedula integer, nombre character varying, apellido_1 character varying, apellido_2 character varying, telefono integer, tipo integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY
  SELECT u.cedula, u.nombre, u.apellido_1, u.apellido_2, u.telefono, u.tipo 
  FROM usuarios u
  WHERE u.cedula = in_cedula;
END;
$$;
 @   DROP FUNCTION public.usuario_obtener_cedula(in_cedula integer);
       public       postgres    false                       1255    20379    usuario_obtener_id(integer)    FUNCTION       CREATE FUNCTION public.usuario_obtener_id(in_id integer) RETURNS TABLE(cedula integer, nombre character varying, apellido_1 character varying, apellido_2 character varying, telefono integer, tipo integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY
  SELECT u.cedula, u.nombre, u.apellido_1, u.apellido_2, u.telefono, u.tipo 
  FROM usuarios u
  WHERE u.id = in_id;
END;
$$;
 8   DROP FUNCTION public.usuario_obtener_id(in_id integer);
       public       postgres    false                       1255    20377    usuario_obtener_tipo(integer)    FUNCTION     �  CREATE FUNCTION public.usuario_obtener_tipo(in_tipo integer) RETURNS TABLE(id integer, cedula integer, nombre character varying, apellido_1 character varying, apellido_2 character varying, telefono integer)
    LANGUAGE plpgsql
    AS $$
BEGIN
  RETURN QUERY
  SELECT u.id, u.cedula, u.nombre, u.apellido_1, u.apellido_2, u.telefono 
  FROM usuarios u
  WHERE u.tipo = in_tipo;
END;
$$;
 <   DROP FUNCTION public.usuario_obtener_tipo(in_tipo integer);
       public       postgres    false            �            1259    20365 	   hidrantes    TABLE     �   CREATE TABLE public.hidrantes (
    id integer NOT NULL,
    nombre character varying(30) NOT NULL,
    calle integer,
    avenida integer,
    caudal integer,
    geom public.geometry(Point,4326)
);
    DROP TABLE public.hidrantes;
       public         postgres    false    2    2    2    2    2    2    2    2            �            1259    20363    hidrantes2_id_seq    SEQUENCE     �   CREATE SEQUENCE public.hidrantes2_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.hidrantes2_id_seq;
       public       postgres    false    227            �           0    0    hidrantes2_id_seq    SEQUENCE OWNED BY     F   ALTER SEQUENCE public.hidrantes2_id_seq OWNED BY public.hidrantes.id;
            public       postgres    false    226            �            1259    20313    inspecciones    TABLE     ;  CREATE TABLE public.inspecciones (
    id integer NOT NULL,
    bombero integer,
    hidrante integer,
    completo boolean DEFAULT false,
    accion integer DEFAULT 0,
    fecha_solicitud date NOT NULL,
    fecha_finalizacion date,
    geom public.geometry(Point,4326),
    hidrante_nuevo character varying(30)
);
     DROP TABLE public.inspecciones;
       public         postgres    false    2    2    2    2    2    2    2    2            �            1259    20311    inspecciones_id_seq    SEQUENCE     �   CREATE SEQUENCE public.inspecciones_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.inspecciones_id_seq;
       public       postgres    false    223            �           0    0    inspecciones_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.inspecciones_id_seq OWNED BY public.inspecciones.id;
            public       postgres    false    222            �            1259    20351    solicitudes    TABLE     �   CREATE TABLE public.solicitudes (
    id integer NOT NULL,
    inspeccion integer,
    estado integer DEFAULT 0,
    fecha_solicitud date,
    fecha_finalizacion date
);
    DROP TABLE public.solicitudes;
       public         postgres    false            �            1259    20349    solicitudes_id_seq    SEQUENCE     �   CREATE SEQUENCE public.solicitudes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.solicitudes_id_seq;
       public       postgres    false    225            �           0    0    solicitudes_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.solicitudes_id_seq OWNED BY public.solicitudes.id;
            public       postgres    false    224            �            1259    20272    usuarios    TABLE     ;  CREATE TABLE public.usuarios (
    id integer NOT NULL,
    cedula integer,
    nombre character varying(30),
    apellido_1 character varying(30),
    apellido_2 character varying(30),
    telefono integer,
    tipo integer,
    contrasena character varying(30) DEFAULT 'contrasena'::character varying NOT NULL
);
    DROP TABLE public.usuarios;
       public         postgres    false            �            1259    20270    usuarios_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.usuarios_id_seq;
       public       postgres    false    221            �           0    0    usuarios_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;
            public       postgres    false    220            �           2604    20368    hidrantes id    DEFAULT     m   ALTER TABLE ONLY public.hidrantes ALTER COLUMN id SET DEFAULT nextval('public.hidrantes2_id_seq'::regclass);
 ;   ALTER TABLE public.hidrantes ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    227    226    227            �           2604    20316    inspecciones id    DEFAULT     r   ALTER TABLE ONLY public.inspecciones ALTER COLUMN id SET DEFAULT nextval('public.inspecciones_id_seq'::regclass);
 >   ALTER TABLE public.inspecciones ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    223    222    223            �           2604    20354    solicitudes id    DEFAULT     p   ALTER TABLE ONLY public.solicitudes ALTER COLUMN id SET DEFAULT nextval('public.solicitudes_id_seq'::regclass);
 =   ALTER TABLE public.solicitudes ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    224    225    225            �           2604    20275    usuarios id    DEFAULT     j   ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);
 :   ALTER TABLE public.usuarios ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    220    221    221            �          0    20365 	   hidrantes 
   TABLE DATA               M   COPY public.hidrantes (id, nombre, calle, avenida, caudal, geom) FROM stdin;
    public       postgres    false    227   :�                 0    20313    inspecciones 
   TABLE DATA               �   COPY public.inspecciones (id, bombero, hidrante, completo, accion, fecha_solicitud, fecha_finalizacion, geom, hidrante_nuevo) FROM stdin;
    public       postgres    false    223   ��       �          0    20351    solicitudes 
   TABLE DATA               b   COPY public.solicitudes (id, inspeccion, estado, fecha_solicitud, fecha_finalizacion) FROM stdin;
    public       postgres    false    225   :�       �          0    18822    spatial_ref_sys 
   TABLE DATA               X   COPY public.spatial_ref_sys (srid, auth_name, auth_srid, srtext, proj4text) FROM stdin;
    public       postgres    false    200   ��       }          0    20272    usuarios 
   TABLE DATA               j   COPY public.usuarios (id, cedula, nombre, apellido_1, apellido_2, telefono, tipo, contrasena) FROM stdin;
    public       postgres    false    221   Ѕ       �          0    20104    topology 
   TABLE DATA               G   COPY topology.topology (id, name, srid, "precision", hasz) FROM stdin;
    topology       postgres    false    215   ņ       �          0    20117    layer 
   TABLE DATA               �   COPY topology.layer (topology_id, layer_id, schema_name, table_name, feature_column, feature_type, level, child_id) FROM stdin;
    topology       postgres    false    216   �       �           0    0    hidrantes2_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.hidrantes2_id_seq', 21, true);
            public       postgres    false    226            �           0    0    inspecciones_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.inspecciones_id_seq', 31, true);
            public       postgres    false    222            �           0    0    solicitudes_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.solicitudes_id_seq', 21, true);
            public       postgres    false    224            �           0    0    usuarios_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.usuarios_id_seq', 23, true);
            public       postgres    false    220            �           2606    20373    hidrantes hidrantes2_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.hidrantes
    ADD CONSTRAINT hidrantes2_pkey PRIMARY KEY (id);
 C   ALTER TABLE ONLY public.hidrantes DROP CONSTRAINT hidrantes2_pkey;
       public         postgres    false    227            �           2606    20319    inspecciones inspecciones_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.inspecciones
    ADD CONSTRAINT inspecciones_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.inspecciones DROP CONSTRAINT inspecciones_pkey;
       public         postgres    false    223            �           2606    20357    solicitudes solicitudes_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.solicitudes
    ADD CONSTRAINT solicitudes_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.solicitudes DROP CONSTRAINT solicitudes_pkey;
       public         postgres    false    225            �           2606    20279    usuarios usuarios_cedula_key 
   CONSTRAINT     Y   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_cedula_key UNIQUE (cedula);
 F   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_cedula_key;
       public         postgres    false    221            �           2606    20277    usuarios usuarios_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public         postgres    false    221            �           2620    20417 !   inspecciones inspecciones_trigger    TRIGGER     �   CREATE TRIGGER inspecciones_trigger AFTER UPDATE ON public.inspecciones FOR EACH ROW EXECUTE PROCEDURE public.inspecciones_trigger_funcion();
 :   DROP TRIGGER inspecciones_trigger ON public.inspecciones;
       public       postgres    false    1556    223            �           2620    20418    solicitudes solicitudes_trigger    TRIGGER     �   CREATE TRIGGER solicitudes_trigger AFTER UPDATE ON public.solicitudes FOR EACH ROW EXECUTE PROCEDURE public.solicitudes_trigger_funcion();
 8   DROP TRIGGER solicitudes_trigger ON public.solicitudes;
       public       postgres    false    1559    225            �           2606    20320 &   inspecciones inspecciones_bombero_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.inspecciones
    ADD CONSTRAINT inspecciones_bombero_fkey FOREIGN KEY (bombero) REFERENCES public.usuarios(id);
 P   ALTER TABLE ONLY public.inspecciones DROP CONSTRAINT inspecciones_bombero_fkey;
       public       postgres    false    223    4337    221            �           2606    20358 '   solicitudes solicitudes_inspeccion_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.solicitudes
    ADD CONSTRAINT solicitudes_inspeccion_fkey FOREIGN KEY (inspeccion) REFERENCES public.inspecciones(id);
 Q   ALTER TABLE ONLY public.solicitudes DROP CONSTRAINT solicitudes_inspeccion_fkey;
       public       postgres    false    223    4339    225            �   `  x�}�;r�0��zu�� ��X<��Ӎ��H��pe8R�X�7,�#�
�7� �}��`H�cu��"T��HX�͘�cߊ���"x ��>�c���V�eAq%�H�1�د��_���kdd���j�S0�%�a�]���
n���`s>.Fᱷ:~P�7C������O���N@`��1G�Q\l��(1Q4��y�����g�}��e!X�bG�ux>����Ռ�����H��z8�c!�uk� ���~�y9�˷��;��.J(y�$%4AsS�����7#�;��^��uT2���!�����=�ڢދm�C�9%�,<�q�N���A1X���mƵ@�X������p� ����         �  x���K��0@��)z�)H��p��n�`6.�)�)��Y��8�������'�0��3�BE�� ��e���E�S�~��-K0� ����F ľhP2k3Fr��V�3��������?uMj����hC�q�zy�μ_�cMΑoE6��[i�J�6a�雤�����y��Ljy��B���ƥr���bN	L��d���������W^��B�Hް���K�s�X��t wmzG{r�����D^<Rw�����G9~w?�n;��1�7�~Yk�x϶�*�UkN��r����L�&��7�2X��������P� ?N���|8M��[����Q��q�8�s�G���<��w~U�ipl�3�ٹ-c�>�{���~Y��L      �   i   x�u��� ��g�6�Kt����T��x���� T[���.�[��7a�R�bA�u�(F0�RS���Vk�-�q�p�3�}��׺�UjTM��(Q5+u�"� ֚=1      �      x������ � �      }   �   x�u��n�0����LMY[v�!!�����k��)��);��s�a�Prh_?��׀�X�0�+	�a�G�q�q#,\k������.�cΛ�hL/Ϟ�"�c����'��A{�Qo��hUi����@#��4$iÍ�I:BFv��������`˒f6���*-�qD�����w�܊ӿi�)��^��2�n������f��1�Z/}�Q>�|UPy-<E�5ō�      �      x������ � �      �      x������ � �     