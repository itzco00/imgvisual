WITH CTE AS (
    (
        SELECT
            T.ESTATUS AS ESTATUS,
            A.OAORNO AS PEDIDO,
            A.OAORST AS STATUS,
            A.OAWHLO AS ALMACEN,
            B.SUMA_PIEZAS,
            A.OACUNO AS CODIGO_CLIENTE,
            CASE
                WHEN ISDATE(T.FECHAHR) = 1 THEN CONVERT(
                    VARCHAR,
                    CONVERT(DATE, CONVERT(VARCHAR, T.FECHAHR), 112)
                )
                ELSE '0000-00-00'
            END AS TIEMPO,
            C.OKCUNM AS CLIENTE,
            ROW_NUMBER() OVER(
                PARTITION BY A.OAORNO,
                T.ESTATUS
                ORDER BY
                    T.FECHAHR
            ) AS RN
        FROM
            M3FDBPRD.MVXJDTA.OOHEAD A (NOLOCK)
            INNER JOIN (
                SELECT
                    A.OAORNO,
                    SUM(B.OBORQT) AS SUMA_PIEZAS
                FROM
                    M3FDBPRD.MVXJDTA.OOHEAD A (NOLOCK)
                    INNER JOIN M3FDBPRD.MVXJDTA.OOLINE B (NOLOCK) ON B.OBCONO = A.OACONO
                    AND B.OBORNO = A.OAORNO
                WHERE
                    A.OACONO = 1
                    AND A.OADIVI = '007'
                    AND A.OAFACI = 'F30'
                    AND A.OAORST = '77'
                    AND A.OAORTP = 'FCD'
                    AND A.OAORDT >= 20240101
                    AND A.OAORDT <= 20240131
                GROUP BY
                    A.OAORNO
            ) B ON A.OAORNO = B.OAORNO
            LEFT JOIN M3FDBPRD.M3DBEAPS.TIMECO T (NOLOCK) ON A.OAORNO = T.NPEDIDO
            INNER JOIN M3FDBPRD.MVXJDTA.OCUSMA C (NOLOCK) ON C.OKCUNO = A.OACUNO
            AND C.OKCONO = A.OACONO
    )
    UNION
    ALL (
        SELECT
            '77' AS ESTATUS,
            W.UAORNO AS PEDIDO,
            A.OAORST AS STATUS,
            A.OAWHLO AS ALMACEN,
            B.SUMA_PIEZAS,
            A.OACUNO AS CODIGO_CLIENTE,
            CASE
                WHEN ISDATE(W.UAIVDT) = 1 THEN CONVERT(
                    VARCHAR,
                    CONVERT(DATE, CONVERT(VARCHAR, W.UAIVDT), 112)
                )
                ELSE '0000-00-00'
            END AS TIEMPO,
            C.OKCUNM AS CLIENTE,
            ROW_NUMBER() OVER(
                PARTITION BY A.OAORNO,
                '77'
                ORDER BY
                    W.UAIVDT
            ) AS RN
        FROM
            M3FDBPRD.MVXJDTA.OOHEAD A (NOLOCK)
            INNER JOIN (
                SELECT
                    A.OAORNO,
                    SUM(B.OBORQT) AS SUMA_PIEZAS
                FROM
                    M3FDBPRD.MVXJDTA.OOHEAD A (NOLOCK)
                    INNER JOIN M3FDBPRD.MVXJDTA.OOLINE B (NOLOCK) ON B.OBCONO = A.OACONO
                    AND B.OBORNO = A.OAORNO
                WHERE
                    A.OACONO = 1
                    AND A.OADIVI = '007'
                    AND A.OAFACI = 'F30'
                    AND A.OAORST = '77'
                    AND A.OAORTP = 'FCD'
                    AND A.OAORDT >= 20240101
                    AND A.OAORDT <= 20240131
                GROUP BY
                    A.OAORNO
            ) B ON A.OAORNO = B.OAORNO
            LEFT JOIN M3FDBPRD.MVXJDTA.ODHEAD W (NOLOCK) ON W.UAORNO = A.OAORNO
            INNER JOIN M3FDBPRD.MVXJDTA.OCUSMA C (NOLOCK) ON C.OKCUNO = A.OACUNO
            AND C.OKCONO = A.OACONO
    )
    UNION
    ALL (
        SELECT
            'ACUSE' AS ESTATUS,
            W.UAORNO AS PEDIDO,
            A.OAORST AS STATUS,
            A.OAWHLO AS ALMACEN,
            B.SUMA_PIEZAS,
            A.OACUNO AS CODIGO_CLIENTE,
            CASE
                WHEN ISDATE(A.OACURD) = 1 THEN CONVERT(
                    VARCHAR,
                    CONVERT(DATE, CONVERT(VARCHAR, A.OACURD), 112)
                )
                ELSE 'Sin fecha'
            END AS TIEMPO,
            C.OKCUNM AS CLIENTE,
            ROW_NUMBER() OVER(
                PARTITION BY A.OAORNO,
                'ACUSE'
                ORDER BY
                    A.OACURD
            ) AS RN
        FROM
            M3FDBPRD.MVXJDTA.OOHEAD A (NOLOCK)
            INNER JOIN (
                SELECT
                    A.OAORNO,
                    SUM(B.OBORQT) AS SUMA_PIEZAS
                FROM
                    M3FDBPRD.MVXJDTA.OOHEAD A (NOLOCK)
                    INNER JOIN M3FDBPRD.MVXJDTA.OOLINE B (NOLOCK) ON B.OBCONO = A.OACONO
                    AND B.OBORNO = A.OAORNO
                WHERE
                    A.OACONO = 1
                    AND A.OADIVI = '007'
                    AND A.OAFACI = 'F30'
                    AND A.OAORST = '77'
                    AND A.OAORTP = 'FCD'
                    AND A.OAORDT >= 20240101
                    AND A.OAORDT <= 20240131
                GROUP BY
                    A.OAORNO
            ) B ON A.OAORNO = B.OAORNO
            LEFT JOIN M3FDBPRD.MVXJDTA.ODHEAD W (NOLOCK) ON W.UAORNO = A.OAORNO
            INNER JOIN M3FDBPRD.MVXJDTA.OCUSMA C (NOLOCK) ON C.OKCUNO = A.OACUNO
            AND C.OKCONO = A.OACONO
    )
)
SELECT
    CTE.ESTATUS,
    CASE
        WHEN ESTATUS = '' THEN 'Captura de Pedido'
        WHEN ESTATUS = '200' THEN 'Pedidos electronicos por procesar'
        WHEN ESTATUS = '201' THEN 'Esperando Producción'
        WHEN ESTATUS = '202' THEN 'Problemas Límite de Crédito'
        WHEN ESTATUS = '203' THEN 'Producción no liberada'
        WHEN ESTATUS = '204' THEN 'Espera de fecha de surtido'
        WHEN ESTATUS = '205' THEN 'Pedido en respuesta de ventas'
        WHEN ESTATUS = '300' THEN 'En mesa de control'
        WHEN ESTATUS = '310' THEN 'Inicio de surtido'
        WHEN ESTATUS = '320' THEN 'Pedido surtiendose  (Inicia proceso)'
        WHEN ESTATUS = '330' THEN 'Auditoria de surtido'
        WHEN ESTATUS = '340' THEN 'Entregado a embarques'
        WHEN ESTATUS = '400' THEN 'En calidad textil'
        WHEN ESTATUS = '405' THEN 'Detenido por habilitaciones'
        WHEN ESTATUS = '410' THEN 'Inicio de maquila'
        WHEN ESTATUS = '420' THEN 'Terminado de maquilar'
        WHEN ESTATUS = '430' THEN 'Entregado a embarques'
        WHEN ESTATUS = '610' THEN 'Por embarcar'
        WHEN ESTATUS = '620' THEN 'En devoluciones'
        WHEN ESTATUS = '630' THEN 'Por cancelar'
        WHEN ESTATUS = '999' THEN 'Listo para surtir.En poder de Captura'
        WHEN ESTATUS = '77' THEN 'Se Factura'
        WHEN ESTATUS = 'ACUSE' THEN 'Se captura acuse y fecha de entrega'
        ELSE ''
    END AS OBSERVACION,
    CASE
        WHEN ESTATUS >= ''
        AND ESTATUS <= '300' THEN 'Tiempo de espera inicial'
        WHEN ESTATUS = '310' THEN 'Tiempo de surtido Onest'
        WHEN ESTATUS >= '330'
        AND ESTATUS <= '430' THEN 'Tiempo de Maquila DTA'
        WHEN ESTATUS = '77' THEN 'Tiempo de espera embarques'
        WHEN ESTATUS = 'ACUSE' THEN 'Tiempo de transito'
        ELSE ''
    END AS RUBRO_A_MEDIR,
    CASE
        WHEN ESTATUS >= ''
        AND ESTATUS <= '300' THEN ISNULL(
            (
                (
                    DATEDIFF(
                        DAY,
                        MIN(
                            CASE
                                WHEN ESTATUS = '' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '300' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '205' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '204' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '202' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '201' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        )
                    ) + 1
                ) - (
                    DATEDIFF(
                        WEEK,
                        MIN(
                            CASE
                                WHEN ESTATUS = '' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '300' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '205' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '204' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '202' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '201' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        )
                    ) * 1
                )
            ),
            0
        )
        WHEN ESTATUS = '310' THEN ISNULL(
            (
                (
                    DATEDIFF(
                        DAY,
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '300' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '205' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '204' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '202' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '201' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        ),
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '330' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '340' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '405' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '410' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '420' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '430' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        )
                    ) + 1
                ) - (
                    DATEDIFF(
                        WEEK,
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '300' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '205' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '204' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '202' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '201' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        ),
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '330' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '340' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '405' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '410' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '420' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '430' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        )
                    ) * 1
                )
            ),
            0
        )
        WHEN ESTATUS >= '330'
        AND ESTATUS <= '430' THEN ISNULL(
            (
                (
                    DATEDIFF(
                        DAY,
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '330' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '310' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '300' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '205' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '204' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '202' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '201' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        ),
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '430' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '420' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '410' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '405' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '340' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '330' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        )
                    ) + 1
                ) - (
                    DATEDIFF(
                        WEEK,
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '330' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '310' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '300' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '205' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '204' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '202' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '201' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        ),
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '430' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '420' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '410' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '405' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '340' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '330' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        )
                    ) * 1
                )
            ),
            0
        )
        WHEN ESTATUS = '77' THEN (
            (
                DATEDIFF(
                    DAY,
                    MIN(
                        CASE
                            WHEN ESTATUS = '77' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    COALESCE(
                        MIN(
                            CASE
                                WHEN ESTATUS = '430' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '420' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '410' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '405' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '340' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '330' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '310' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '300' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '205' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '204' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '202' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '201' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO)
                    )
                ) * -1
            ) + 1
        ) - (
            DATEDIFF(
                WEEK,
                MIN(
                    CASE
                        WHEN ESTATUS = '77' THEN TIEMPO
                    END
                ) OVER (PARTITION BY PEDIDO),
                COALESCE(
                    MIN(
                        CASE
                            WHEN ESTATUS = '430' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '420' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '410' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '405' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '340' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '330' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '310' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '300' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '205' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '204' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '202' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '201' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    MIN(
                        CASE
                            WHEN ESTATUS = '' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO)
                )
            ) * (-1)
        )
        WHEN ESTATUS = 'ACUSE' THEN CASE
            WHEN TIEMPO = 'Sin fecha' THEN 0
            ELSE (
                (
                    DATEDIFF(
                        DAY,
                        MIN(
                            CASE
                                WHEN ESTATUS = 'ACUSE' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        COALESCE(
                            MIN(
                                CASE
                                    WHEN ESTATUS = '77' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '430' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '420' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '410' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '405' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '340' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '330' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '310' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '300' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '205' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '204' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '202' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '201' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO),
                            MIN(
                                CASE
                                    WHEN ESTATUS = '' THEN TIEMPO
                                END
                            ) OVER (PARTITION BY PEDIDO)
                        )
                    ) * -1
                ) + 1
            ) - (
                DATEDIFF(
                    WEEK,
                    MIN(
                        CASE
                            WHEN ESTATUS = 'ACUSE' THEN TIEMPO
                        END
                    ) OVER (PARTITION BY PEDIDO),
                    COALESCE(
                        MIN(
                            CASE
                                WHEN ESTATUS = '77' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '430' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '420' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '410' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '405' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '340' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '330' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '310' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '300' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '205' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '204' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '202' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '201' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO),
                        MIN(
                            CASE
                                WHEN ESTATUS = '' THEN TIEMPO
                            END
                        ) OVER (PARTITION BY PEDIDO)
                    )
                ) * (-1)
            )
        END
        ELSE 0
    END AS TIEMPO_CICLO,
    CTE.PEDIDO,
    CTE.STATUS,
    CTE.ALMACEN,
    CTE.SUMA_PIEZAS,
    CTE.CODIGO_CLIENTE,
    CTE.CLIENTE,
    CTE.TIEMPO
FROM
    CTE
WHERE
    CTE.RN = 1
ORDER BY
    PEDIDO,
    CASE
        ESTATUS
        WHEN '' THEN 1
        WHEN '200' THEN 2
        WHEN '201' THEN 3
        WHEN '202' THEN 4
        WHEN '203' THEN 5
        WHEN '204' THEN 6
        WHEN '205' THEN 7
        WHEN '300' THEN 8
        WHEN '310' THEN 9
        WHEN '320' THEN 10
        WHEN '330' THEN 11
        WHEN '340' THEN 12
        WHEN '400' THEN 13
        WHEN '405' THEN 14
        WHEN '410' THEN 15
        WHEN '420' THEN 16
        WHEN '430' THEN 17
        WHEN '610' THEN 18
        WHEN '620' THEN 19
        WHEN '630' THEN 20
        WHEN '999' THEN 20
        WHEN '77' THEN 21
        WHEN 'ACUSE' THEN 22
        ELSE 23
    END